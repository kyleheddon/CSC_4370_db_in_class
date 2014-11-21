#!/usr/bin/env ruby

print "Enter your codd username: \n"
username = gets.chomp

puts "Creating sync.rb file with username #{username}\n"

sync_file_contents = '#!/usr/bin/env ruby \n'
sync_file_contents += '\`cd app && scp -r ./'' ' + username + '@codd.cs.gsu.edu:~/public_html/db_in_class\`'

`echo "#{sync_file_contents}" > sync.rb && chmod 755 sync.rb`

puts "Done! To sync the app directory, enter \"./sync.rb\" into the terminal.\n"



print "Enter your MySQL password: \n"
password = gets.chomp

puts "Creating app/lib/db_config.php file with username #{username} and your password\n"

db_config_file_contents = <<-EOS
<?php
	function get_mysql_credentials(){
		return array(
			'username' => '#{username}',
			'password' => '#{password}'
		);
	}
?>
EOS

`mkdir -p app/lib`
`echo "#{db_config_file_contents}" > app/lib/db_config.php`
