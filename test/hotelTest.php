<?php

include_once 'lib/hotel.php';

class hotelTest extends PHPUnit_Framework_TestCase
{	
  public function testSettingsDefaultValues()
  {
  	 $settingsVariables = array
  	 					("username"=>"John", 
  	 					"password"=>"Johnpass", 
  	 					"culture"=>"en_US", 
  	 					"version"=>"7.123", 
  	 					"testEnvironment");
	 
	 $settings = new \Settings($settingsVariables);
     $this->assertSame('Johnpass', 'Johnpass');
  }
  
  public function testSettingsDefaultValues1() 
  {  		
	 $settingsVariables = array
  	 					("username"=>"John", 
  	 					"password"=>"Johnpass", 
  	 					"culture"=>"en_US", 
  	 					"version"=>"7.123", 
  	 					"testEnvironment");
						
	$settings = new \Settings($settingsVariables);
    $this->assertTrue(TRUE);
  }
  
  public function testSettingsDefaultValues2() 
  {
	 $settingsVariables = array
  	 					("username"=>"John", 
  	 					"password"=>"Johnpass", 
  	 					"culture"=>"en_US", 
  	 					"version"=>"7.123", 
  	 					"testEnvironment");
    
    $settings = new \Settings($settingsVariables);
    $this->assertFalse(FALSE);
  }
  
  public function testSettingsDefaultValues3() 
  {
	 $settingsVariables = array
  	 					("username"=>"John", 
  	 					"password"=>"Johnpass", 
  	 					"culture"=>"en_US", 
  	 					"version"=>"7.123", 
  	 					"testEnvironment");	
						
  	$settings = new \Settings($settingsVariables);  
	$this->assertEquals($settings->username, $settings->username);
  }

  public function testSettingsDefaultValues4() 
  {
	 $settingsVariables = array
  	 					("username"=>"John", 
  	 					"password"=>"Johnpass", 
  	 					"culture"=>"en_US", 
  	 					"version"=>"7.123", 
  	 					"testEnvironment");
						
    $settings = new \Settings($settingsVariables);  
	$this->assertNotEquals($settings->username, "Mary");
  }
 
  public function testSearchHotels() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->searchHotel(array
    					("Destination"=>"NYC", 
    					 "HotelCityName" =>"",
    					 "HotelLocationName" =>"",
    					 "HotelName" =>"",
    					 "CheckIn"=>"2013-10-25",
    					 "CheckOut"=>"2013-10-30", 
    					 "AdultNum"=>"Wlliam",
						 "ChildNum" =>"",
    					 "ChildAge" =>"",
    					 "MaxPrice" =>"",
						 "StarLevel" =>"",
    					 "AvailableOnly" =>"",
    					 "PropertyType" =>"",
						 "ExactDestination"=>""));
   assert($result);					 
  }
  
  public function testSearchHotelsById() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->SearchHotelsById(array
    					("HotelIdInfo"=>"852", 
    					 "CheckIn"=>"2013-11-15",
    					 "CheckOut"=>"2013-11-17", 
    					 "AdultNum"=>"2",
						 "ChildNum" =>"1",
    					 "ChildAge" =>"10",
    					 "MaxPrice" =>"0",
						 "StarLevel" =>"0",
    					 "AvailableOnly" =>TRUE));	 
   assert($result);
   //$this->assertTrue($result == $result);
  }
  
  public function testSearchHotelsByDestinationIds() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->SearchHotelsByDestinationIds(array
    					("DestinationIdInfo"=>"852", 
    					 "CheckIn"=>"2013-11-15",
    					 "CheckOut"=>"2013-11-17", 
    					 "AdultNum"=>"2",
						 "ChildNum" =>"1",
    					 "ChildAge" =>"10",
    					 "MaxPrice" =>"0",
						 "StarLevel" =>"0",
						 
    					 "AvailableOnly" =>TRUE,
						 "PropertyType"=>"NotSet",
						 "ExactDestination"=>TRUE));	 
   assert($result);
   //$this->assertTrue($result == $result);
  }
  
  public function testGetHotelDetailsV3() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->getHotelDetailsV3(array
    					("HotelId"=>"1203719", 
    					 "FeatureName" =>"OriginalImageSize",
    					 "FeatureValue" =>TRUE));
   assert($result);					 
  }
  
  public function testCheckAvailabilityAndPrices() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->CheckAvailabilityAndPrices(array
    					("HotelId"=>"1203719", 
    					 "CheckIn"=>"2013-11-15",
    					 "CheckOut"=>"2013-11-17", 
    					 "AdultNum"=>"2",
						 "ChildNum" =>"1",
    					 "ChildAge" =>"10",
    					 "MaxPrice" =>"0",
						 "StarLevel" =>"0",
    					 "AvailableOnly" =>TRUE));
   assert($result);					 
  }
  
  public function testBookHotelV3() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->BookHotelV3(array
    					("RecordLocatorId"=>"0",
    					 "HotelId"=>"1203719", 
    					 "HotelRoomTypeId"=>"1699316", 
    					 "CheckIn"=>"2013-11-15",
    					 "CheckOut"=>"2013-11-17", 
    					 "RoomId"=>"1", 
    					 "ContactPassenger_FirstName"=>"Lebron",
    					 "ContactPassenger_MiddleName"=>"",
    					 "ContactPassenger_LastName"=>"James",
    					 "ContactPassenger_HomePhone"=>"111-111-111",
    					 "ContactPassenger_MobilePhone"=>"222-222-222",
    					 "SelectedBoardBase"=>"",
    					 "SelectedSupplements"=>"",
    					 "Bedding"=>"2, 1",
    					 "Note"=>"Can we please have a city view? Thanks !",
    					 "AdultNum"=>"2",
						 "ChildNum" =>"0",
    					 "ChildAges" =>"0",
    					 "PaymentType" =>"Obligo",
    					 "AgentRefNumber " =>"123NA",
						 "ContactInfo" =>"333-333-333",
						 "RequestedPrice" =>"322.80",
						 "DeltaPrice" =>"0",
						 "Currency " =>"USD",
						 "IsOnlyAvailable" =>TRUE,
						 "ConfirmationEmail" =>"logo.gif",
						 "ConfirmationLogo"=>"lebronjames@nba.com"));
   assert($result);					 
  }
  
  public function testCostAmend() 
  {
    $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
    $result = $hotel->CostAmend(array
    					("RecordLocatorId"=>"39971007",
    					 "HotelId"=>"1216326", 
    					 "HotelRoomTypeId"=>"1975682", 
    					 "CheckIn"=>"2013-11-15",
    					 "CheckOut"=>"2013-11-17", 
    					 "ReservationId"=>"40950528", 
    					 "AdultNum"=>"2",
						 "ChildNum" =>"1",
    					 "ChildAges" =>"6",
    					 "ContactPassenger_FirstName"=>"Michael",
    					 "ContactPassenger_MiddleName"=>"Jeffrey",
    					 "ContactPassenger_LastName"=>"Jordan",
    					 "ContactPassenger_HomePhone"=>"111-111-111",
    					 "ContactPassenger_MobilePhone"=>"222-222-222",
    					 "SelectedBoardBase"=>"",
    					 "SelectedSupplements"=>"",
    					 "Note"=>"We don't want a city view anymore. Thanks !",
    					 "AgentRefNumber " =>"123NA",
						 "IsOnlyAvailable" =>TRUE));
   assert($result);					 
  }  
  
  public function testGetRGInfo() 
  {
   $hotel = new \Hotel(new \Settings(array
    					 ("username"=>"John",
    					  "password"=>"Johnpass",
    					  "culture"=>"en_US", 
    					  "version"=>"7.123", 
    					  "testEnvironment" => TRUE)));
						  
   $result = $hotel->GetRGInfo(array
    					("nRGID"=>"36490867"));
   assert($result);					 
  }
 }



?>