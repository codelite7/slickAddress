#!/usr/bin/perl

    local ($buffer, @pairs, $pair, $name, $value, %FORM);
    # Read in text
    $ENV{'REQUEST_METHOD'} =~ tr/a-z/A-Z/;
    if ($ENV{'REQUEST_METHOD'} eq "POST")
    {
        read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
    }else {
	$buffer = $ENV{'QUERY_STRING'};
    }
    # Split information into name/value pairs
    @pairs = split(/&/, $buffer);
    foreach $pair (@pairs)
    {
	($name, $value) = split(/=/, $pair);
	$value =~ tr/+/ /;
	$value =~ s/%(..)/pack("C", hex($1))/eg;
	$FORM{$name} = $value;
    }
    $firstName = $FORM{firstName};
    $lastName  = $FORM{lastName};
	$address  = $FORM{address};
	$cellNumber  = $FORM{cellNumber};
	$company  = $FORM{company};
	$email  = $FORM{email};
	$faxNumber  = $FORM{faxNumber};
	$homeNumber  = $FORM{homeNumber};
	$notes  = $FORM{notes};
	$website = $FORM{website};
	$workNumber  = $FORM{workNumber};

print "Content-type:text/html\r\n\r\n";
$result = "$firstName $lastName $address $cellNumber $company $email $faxNumber $homeNumber $notes $website $worknumber";
print $result;


1;