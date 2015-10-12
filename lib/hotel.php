<?php 
class Settings {
public $username;
public $testEnvironment;
/**
 * In the array settings the "testEnvironment" is optional, being "false" the default value if it is not specified
 */
public function __constructor($settings) {
  $this->username = $settings["user"];
  $this->testEnvironment = isset($settings["testEnvironment"]) ? $settings["testEnvironment"] : false;
}
}
 

class Hotel {


	protected $baseUrl;

	function __constructor($settings) {
	$this->baseUrl = $settings->testEnvironment == true ? 
  	"http://test.demo-hotelws.touricoholidays.com/HotelFlow.svc?WSDL"
	:
  	"http://demo-hotelws.touricoholidays.com/HotelFlow.svc?WSDL"
	;
	}

	function getHotelDetailsV3($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetHotelDetailsV3($this->convertParamsIntoTouricoParams($params));
  	return $this->returnHotelDetailsV3($result);
	}

	function returnHotelDetailsV3($touricoResult) {
		$link = $touricoResult->envelop;
  		$Hotel = array(
			array("hotelID", $link->hotelID),
			array("name", $link->name),
			array("rooms", $link->rooms),
			array("provider", $link->provider),
			array("checkInTime", $link->checkInTime),
			array("checkOutTime", $link->checkOutTime),
			array("currency", $link->currency),
			array("thumb", $link->thumb),
			array("hotelPhone", $link->hotelPhone),
			array("hotelFax", $link->hotelFax),
			array("starLevel", $link->starLevel),
			array("ranking", $link->ranking),
			array("bestVal", $link->bestVal)
		);
  		$Location = array(
  			array("country", $link->country),
  			array("state", $link->state),
  			array("city", $link->city),
  			array("searchingCity", $link->searchingCity),
  			array("destinationCode", $link->destinationCode),
  			array("destinationId", $link->destinationId),
  			array("location", $link->location),
  			array("address", $link->address),
  			array("zip", $link->zip),
  			array("longitude", $link->longitude),
  			array("latitude", $link->latitude)
  		);
		$RefPoints = array(
			array("type", $link->type),
			array("typeId", $link->typeId),
			array("name", $link->name),
			array("airportCode", $link->airportCode),
			array("direction", $link->direction),
			array("distance", $link->distance),
			array("unit", $link->unit)
		);
		$VoucherRemark = $link->VoucherRemark;
		$ShortDescription = $link->ShortDescription;
		$LongDescription = $link->LongDescription;
		$Images = array(
			array("type", $link->type),
			array("path", $link->path)
		);
		$Amenities = array(
			array("amenityID", $link->amenityID),
			array("name", $link->name)
		);
		$RoomType = array(
			array("hotelID", $link->hotelID),
			array("roomID", $link->roomID),
			array("name", $link->name),
			array("maxGuest", $link->maxGuest),
			array("roomTypeCategory", $link->roomTypeCategory),
			array("roomTypeCategoryId", $link->roomTypeCategoryId)
		);
		$Facilities = array(
			array("facilityId", $link->facilityId),
			array("name", $link->name)
		);
  	}
	
	
	
	
	
	
	
	
	
}

?>