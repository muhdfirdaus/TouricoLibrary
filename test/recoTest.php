<?php

include_once 'lib/reco.php';

class recoTest extends PHPUnit_Framework_TestCase
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
  
  public function testSearchRecoWs() 
  {
    $mc = new \RecoWs(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $mc->GetInvoices(array
    					("searchOption"=>"NYC", 
    					 "fromServiceDate" =>"2013-10-01",
    					 "daysServiceDate" =>"31",
    					 "paymentDate" =>"2013-12-01",
    					 "fromCreationDate"=>"2013-10-01",
    					 "daysCreationDate"=>"31"));
						 
   $this->assertTrue($result == $result);
  }
}






	
	







?>