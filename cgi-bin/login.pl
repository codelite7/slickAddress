#!/usr/bin/perl
use warnings;
use DBI;
print "Content-type:text/html\r\n\r\n";
use CGI::Carp 'fatalsToBrowser';

#Get the form data from the user, and create a new session with their userID so we can use it for queries.

#Get the form data

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
	
	$userName = $FORM{userName};
	$password = $FORM{password};
	
	print "$userName $password"; 
	
#Connect to the database
	my $driver = "mysql"; 
	my $database = "zackstev_slickaddr";
	my $dsn = "DBI:$driver:database=$database";
	my $userid = "zackstev_slickad";
	my $password = "Blackbird89!";

	my $dbh = DBI->connect($dsn, $userid, $password ) or die $DBI::errstr;
	
#Query the database to see if there is a match for the userName and password
#	my $sth = $dbh->prepare("SELECT ID
#                        FROM users
#                        WHERE username = ? && password = ?");
#	$sth->execute($userName, $password) or die $DBI::errstr;
#	print "Number of rows found :" + $sth->rows;
#	while (my @row = $sth->fetchrow_array()) {
#   		my ($ID) = @row;
#   		print "ID = $ID \n";
#}
#$sth->finish();
#If there is no match, alert to the user that the username or password is incorrect

#If there is a match, create a session with the user's ID as a param

#    $sid = $cgi->cookie('CGISESSID') || $cgi->param('CGISESSID') || undef;
#    $session = new CGI::Session(undef, $sid, {Directory=>'/tmp'});
#	$session->param("userID", $ID);