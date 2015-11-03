<?php

include_once 'lib/activity.php';

class activityTest extends PHPUnit_Framework_TestCase
{	
  public function testFailure()
  {
  	 $settingsVariables = array("username"=>"John", "password"=>"Johnpass", "culture"=>"en_US", "version"=>"7.123", "testEnvironment");
	 $settings = new \Settings($settingsVariables);
     $this->assertSame('Johnpass', 'Johnpass');
  }
  
  public function testSettingsDefaultValues1() 
  {  		
  	$settingsVariables = array("username"=>"John", "password"=>"Johnpass", "culture"=>"en_US", "version"=>"7.123", "testEnvironment" => TRUE);;
	$settings = new \Settings($settingsVariables);
    $this->assertTrue(TRUE);
  }
  
  public function testSettingsDefaultValues2() 
  {
  	$settingsVariables = array("username"=>"John", "password"=>"Johnpass", "culture"=>"en_US", "version"=>"7.123", "testEnvironment");;
	$settings = new \Settings($settingsVariables);
    $this->assertFalse(FALSE);
  }
  
  public function testSettingsDefaultValues3() 
  {
  	$settingsVariables = array("username"=>"John", "password"=>"Johnpass", "culture"=>"en_US", "version"=>"7.123", "testEnvironment");
	$settings = new \Settings($settingsVariables);  
	$this->assertEquals($settings->username, $settings->username);
  }

  public function testSettingsDefaultValues4() 
  {
	$setingsVariables = array("username"=>"John", "password"=>"Johnpass", "culture"=>"en_US", "version"=>"7.123", "testEnvironment");
	$settings = new \Settings($settingsVariables);  
	$this->assertNotEquals($settings->username, "Mary");
  }
}






	
	







?>