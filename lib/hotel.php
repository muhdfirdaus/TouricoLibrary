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
 
//this is
class Hotel {


	protected $baseUrl;

	function __constructor($settings) {
	$this->baseUrl = $settings->testEnvironment == true ? 
  	"http://test.demo-hotelws.touricoholidays.com/HotelFlow.svc?WSDL"
	:
  	"http://demo-hotelws.touricoholidays.com/HotelFlow.svc?WSDL"
	;
	}
	
	function searchHotel($params){
			
		$client = new soapClient($this->baseUrl);
		$result	= $client -> searchHotel($this->convertParamsIntoTouricoParams($params));
		return $this->returnSearchHotels($result);
	}
	
	function returnSearchHotels($touricoResult) {
	
		$link = $touricoResult->envelop;
	
		$Hotel = [
				
				'brandId' => $link->Hotel->brandId,
				'brandName' => $link->Hotel->brandName,
				'category' => $link->Hotel->category,
				'PropertySubType' => $link->Hotel->PropertySubType,
				'NumOfRoom' => $link->Hotel->NumOfRoom,
				'bestValue' => $link->Hotel->bestValue,
				'HotelId' => $link->Hotel->HotelId,
				'provider (Name)' => $link->Hotel->provider (Name),
				'name (Hotel)' => $link->Hotel->name (Hotel),
				'thumb' => $link->Hotel->thumb,
				'currency' => $link->Hotel->currency,
				'minAverPrice' => $link->Hotel->minAverPrice,
				'starsLevel' => $link->Hotel->starsLevel,
				'desc' => $link->Hotel->desc,
				'MinAverPublishPrice' => $link->Hotel->MinAverPublishPrice,
				'PropertyType' => $link->Hotel->PropertyType
		];
			
		$Location = [
					
				'countryCode' => $link->Location->countryCode,
				'stateCode' => $link->Location->stateCode,
				'city' => $link->Location->city,
				'searchingState' => $link->Location->searchingState,
				'searchingCity' => $link->Location->searchingCity,
				'location' => $link->Location->location,
				'address' => $link->Location->address,
				'longitude' => $link->Location->longitude,
				'latitude' => $link->Location->latitude
		];
			
		$RoomType = [
					
				'NumOfBathrooms' => $link->RoomType->NumOfBathrooms,
				'roomTypeCategory' => $link->RoomType->roomTypeCategory,
				'roomTypeCategoryId' => $link->RoomType->roomTypeCategoryId,
				'nights' => $link->RoomType->nights,
				'name (Room Type)' => $link->RoomType->name (RoomType),
				'productId' => $link->RoomType->productId,
				'startDate' => $link->RoomType->startDate,
				'hotelRoomTypeId' => $link->RoomType->hotelRoomTypeId,
				'roomId $link' => $link->RoomType->roomId,
				'isAvailable' => $link->RoomType->isAvailable
		];
			
		$AvailabilityBreakdown = [
					
				'offset' => $link->AvailabilityBreakdown->offset,
				'status (Availability)' => $link->AvailabilityBreakdown->status (Availability)
		];
			
		$Discount = [
					
				'from' => $link->Discount->from,
				'to' => $link->Discount->to
		];
			
		$Occupancy = [
					
				'taxPublish' => $link->Occupancy->axPublish,
				'occupPublishPrice' => $link->Occupancy->occupPublishPrice,
				'occupId' => $link->Occupancy->occupId,
				'avrNightPublishPrice' => $link->Occupancy->avrNightPublishPrice,
				'occupPrice' => $link->Occupancy->occupPrice,
				'maxChild' => $link->Occupancy->maxChild,
				'maxGuests' => $link->Occupancy->maxGuests,
				'tax' => $link->Occupancy->tax,
				'avrNightPrice' => $link->Occupancy->avrNightPrice,
				'bedding' => $link->Occupancy->bedding,
				'isPublish' => $link->Occupancy->isPublish
		];
			
		$PriceBreakdown = [
					
				'offset' => $link->PriceBreakdown->offset,
				'value' => $link->PriceBreakdown->value,
				'valuePublish' => $link->PriceBreakdown->valuePublish
		];
			
		$Rooms = [
					
				'seqNum' => $link->Rooms->seqNum,
				'AdultNum' => $link->Rooms->AdultNum,
				'ChildNum' => $link->Rooms->ChildNum,
				'ChildAge' => $link->Rooms->ChildAge
		];
			
		$Supplement = [
					
				'type' => $link->Supplement->type,
				'suppId' => $link->Supplement->suppId,
				'suppName' => $link->Supplement->suppName,
				'supptType' => $link->Supplement->supptType,
				'suppIsMandatory' => $link->Supplement->suppIsMandatory,
				'suppChargeType' => $link->Supplement->suppChargeType,
				'price' => $link->Supplement->price,
				'publishPrice' => $link->Supplement->publishPrice
		];
			
		$Boardbase = [
					
				'bbId' => $link->Boardbase->bbId,
				'bbName' => $link->Boardbase->bbName,
				'bbPrice' => $link->Boardbase->bbPrice,
				'bbPublishPrice' => $link->Boardbase->bbPublishPrice
		];
			
		return $hotel.$location.$RoomType.$AvailabilityBreakdown.$Discount.$Occupancy.$PriceBreakdown.$Rooms.$Supplement.$Boardbase;
	
	
	}
	
	function SearchHotelsById($params){
			
		$client = new soapClient($this->baseUrl);
		$result	= $client -> SearchHotelsById($this->convertParamsIntoTouricoParams($params));
		return $this->returnSearchHotelsById($result);
	}
	
	function returnSearchHotelsById($touricoresult) {
			
		$link = $touricoResult->envelop;
			
		$Hotel = [
					
				'brandId' => $link->Hotel->brandId,
				'brandName' => $link->Hotel->brandName,
				'category' => $link->Hotel->category,
				'PropertySubType' => $link->Hotel->PropertySubType,
				'NumOfRoom' => $link->Hotel->NumOfRoom,
				'bestValue' => $link->Hotel->bestValue,
				'HotelId' => $link->Hotel->HotelId,
				'provider (Name)' => $link->Hotel->provider (Name),
				'name (Hotel)' => $link->Hotel->name (Hotel),
				'thumb' => $link->Hotel->thumb,
				'currency' => $link->Hotel->currency,
				'minAverPrice' => $link->Hotel->minAverPrice,
				'starsLevel' => $link->Hotel->starsLevel,
				'desc' => $link->Hotel->desc,
				'MinAverPublishPrice' => $link->Hotel->MinAverPublishPrice,
				'PropertyType' => $link->Hotel->PropertyType
		];
			
		$Location = [
					
				'countryCode' => $link->Location->countryCode,
				'stateCode' => $link->Location->stateCode,
				'city' => $link->Location->city,
				'searchingState' => $link->Location->searchingState,
				'searchingCity' => $link->Location->searchingCity,
				'location' => $link->Location->location,
				'address' => $link->Location->address,
				'longitude' => $link->Location->longitude,
				'latitude' => $link->Location->latitude
		];
			
		$RoomType = [
					
				'NumOfBathrooms' => $link->RoomType->NumOfBathrooms,
				'roomTypeCategory' => $link->RoomType->roomTypeCategory,
				'roomTypeCategoryId' => $link->RoomType->roomTypeCategoryId,
				'nights' => $link->RoomType->nights,
				'name (Room Type)' => $link->RoomType->name (RoomType),
				'productId' => $link->RoomType->productId,
				'startDate' => $link->RoomType->startDate,
				'hotelRoomTypeId' => $link->RoomType->hotelRoomTypeId,
				'roomId' => $link->RoomType->roomId,
				'isAvailable' => $link->RoomType->isAvailable
		];
			
		$AvailabilityBreakdown = [
					
				'offset' => $link->AvailabilityBreakdown->offset,
				'status (Availability)' => $link->AvailabilityBreakdown->status (Availability)
		];
			
		$Discount = [
					
				'from' => $link->Discount->from,
				'to' => $link->Discount->to
		];
			
		$Occupancy = [
					
				'taxPublish' => $link->Occupancy->taxPublish,
				'occupPublishPrice' => $link->Occupancy->occupPublishPrice,
				'occupId' => $link->Occupancy->occupId,
				'avrNightPublishPrice' => $link->Occupancy->avrNightPublishPrice,
				'occupPrice' => $link->Occupancy->occupPrice,
				'maxChild' => $link->Occupancy->maxChild,
				'maxGuests' => $link->Occupancy->maxGuests,
				'tax' => $link->Occupancy->tax,
				'avrNightPrice' => $link->Occupancy->avrNightPrice,
				'bedding' => $link->Occupancy->bedding,
				'isPublish' => $link->Occupancy->isPublish
		];
			
		$PriceBreakDown = [
					
				'offset' => $link->PriceBreakDown->offset,
				'value' => $link->PriceBreakDown->value,
				'valuePublish' => $link->PriceBreakDown->valuePublish
		];
			
		$Rooms = [
					
				'seqNum' => $link->Rooms->seqNum,
				'AdultNum' => $link->Rooms->AdultNum,
				'ChildNum' => $link->Rooms->ChildNum,
				'ChildAge' => $link->Rooms->ChildAge
		];
			
		$Supplement = [
					
				'type' => $link->Supplement->type,
				'suppId' => $link->Supplement->suppId,
				'suppName' => $link->Supplement->suppName,
				'suppType' => $link->Supplement->suppType,
				'suppIsMandatory' => $link->Supplement->suppIsMandatory,
				'suppChargeType' => $link->Supplement->suppChargeType,
				'price' => $link->Supplement->price,
				'publishPrice' => $link->Supplement->publishPrice
		];
			
		$BoardBase = [
					
				'bbId' => $link->BoardBase->bbId,
				'bbName' => $link->BoardBase->bbName,
				'bbPrice' => $link->BoardBase->bbPrice,
				'bbPublishPrice' => $link->BoardBase->bbPublishPrice
		];
			
		return $Hotel.$Location.$RoomType.$AvailabilityBreakdown.$Discount.$Occupancy.$PriceBreakDown.$Rooms.$Supplement.$BoardBase;
	
	}
	
	function SearchHotelsByDestinationIds($params){
			
		$client = new soapClient($this->baseUrl);
		$result	= $client -> SearchHotelsByDestinationIds($this->convertParamsIntoTouricoParams($params));
		return $this->returnSearchHotelsByDestinationIds($result);
	}
	
	function returnSearchHotelsByDestinationIds($touricoresult) {
	
		$link = $touricoResult->envelop;
	
		$Hotel = [
	
				'brandId' => $link->Hotel->brandId,
				'brandName' => $link->Hotel->brandName,
				'category' => $link->Hotel->category,
				'PropertySubType' => $link->Hotel->PropertySubType,
				'NumOfRoom' => $link->Hotel->NumOfRoom,
				'bestValue' => $link->Hotel->bestValue,
				'HotelId' => $link->Hotel->HotelId,
				'provider (Name)' => $link->Hotel->provider (Name),
				'name (Hotel)' => $link->Hotel->name (Hotel),
				'thumb' => $link->Hotel->thumb,
				'currency' => $link->Hotel->currency,
				'minAverPrice' => $link->Hotel->minAverPrice,
				'starsLevel' => $link->Hotel->starsLevel,
				'desc' => $link->Hotel->desc,
				'MinAverPublishPrice' => $link->Hotel->MinAverPublishPrice,
				'PropertyType' => $link->Hotel->PropertyType
		];
			
		$Location = [
	
				'countryCode' => $link->Location->countryCode,
				'stateCode' => $link->Location->stateCode,
				'city' => $link->Location->city,
				'searchingState' => $link->Location->searchingState,
				'searchingCity' => $link->Location->searchingCity,
				'location' => $link->Location->location,
				'address' => $link->Location->address,
				'longitude' => $link->Location->longitude,
				'latitude' => $link->Location->latitude
		];
		$rt = 'name (Room Type)';
		$RoomType = [
	
				'NumOfBathrooms' => $link->RoomType->NumOfBathrooms,
				'roomTypeCategory' => $link->RoomType->roomTypeCategory,
				'roomTypeCategoryId' => $link->RoomType->roomTypeCategoryId,
				'nights' => $link->RoomType->nights,
				'name (Room Type)' => $link->RoomType->$rt,
				'productId' => $link->RoomType->productId,
				'startDate' => $link->RoomType->startDate,
				'hotelRoomTypeId' => $link->RoomType->hotelRoomTypeId,
				'roomId' => $link->RoomType->roomId,
				'isAvailable' => $link->RoomType->isAvailable
		];
			
		$AvailabilityBreakdown = [
	
				'offset' => $link->AvailabilityBreakdown->offset,
				'status (Availability)' =>  $link->AvailabilityBreakdown->status (Availability)
		];
			
		$Discount = [
	
				'from' => $link->Discount->from,
				'to' => $link->Discount->to,
		];
			
		$Occupancy = [
	
				'taxPublish' => $link->Occupancy->taxPublish,
				'occupPublishPrice' => $link->Occupancy->occupPublishPrice,
				'occupId' => $link->Occupancy->occupId,
				'avrNightPublishPrice' => $link->Occupancy->avrNightPublishPrice,
				'occupPrice' => $link->Occupancy->occupPrice,
				'maxChild' => $link->Occupancy->maxChild,
				'maxGuests' => $link->Occupancy->maxGuests,
				'tax' => $link->Occupancy->tax,
				'avrNightPrice' => $link->Occupancy->avrNightPrice,
				'bedding' => $link->Occupancy->bedding,
				'isPublish' => $link->Occupancy->isPublish
		];
			
		$PriceBreakDown = [
	
				'offset' => $link->PriceBreakDown->offset,
				'value' => $link->PriceBreakDown->value,
				'valuePublish' => $link->PriceBreakDown->valuePublish
		];
			
		$Rooms = [
	
				'seqNum' => $link->Rooms->seqNum,
				'AdultNum' => $link->Rooms->AdultNum,
				'ChildNum' => $link->Rooms->ChildNum,
				'ChildAge' => $link->Rooms->ChildAge
		];
			
		$Supplement = [
	
				'type' => $link->Supplement->type,
				'suppId' => $link->Supplement->suppId,
				'suppName' => $link->Supplement->suppName,
				'suppType' => $link->Supplement->suppType,
				'suppIsMandatory' => $link->Supplement->suppIsMandatory,
				'suppChargeType' => $link->Supplement->suppChargeType,
				'price' => $link->Supplement->price,
				'publishPrice' => $link->Supplement->publishPrice
		];
			
		$BoardBase = [
	
				'bbId' => $link->BoardBase->bbId,
				'bbName' => $link->BoardBase->bbName,
				'bbPrice' => $link->BoardBase->bbPrice,
				'bbPublishPrice' => $link->BoardBase->bbPublishPrice
		];
			
		return $Hotel.$Location.$RoomType.$AvailabilityBreakdown.$Discount.$Occupancy.$PriceBreakDown.$Rooms.$Supplement.$BoardBase;
	
	}
	

	function getHotelDetailsV3($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetHotelDetailsV3($this->convertParamsIntoTouricoParams($params));
  	return $this->returnHotelDetailsV3($result);
	}

	function returnHotelDetailsV3($touricoResult) {
		$link = $touricoResult->envelop;
  		$Hotel = [
			'hotelID' => $link->Hotel->hotelID,
			'name' => $link->Hotel->name,
			'rooms' => $link->Hotel->rooms,
			'provider' => $link->Hotel->provider,
			'checkInTime' => $link->Hotel->checkInTime,
			'checkOutTime' => $link->Hotel->checkOutTime,
			'currency' => $link->Hotel->currency,
			'thumb' => $link->Hotel->thumb,
			'hotelPhone' => $link->Hotel->hotelPhone,
			'hotelFax' => $link->Hotel->hotelFax,
			'starLevel' => $link->Hotel->starLevel,
			'ranking' => $link->Hotel->ranking,
			'bestVal' => $link->Hotel->bestVal
		];
  		$Location = [
  			'country' => $link->Location->country,
  			'state' => $link->Location->state,
  			'city' => $link->Location->city,
  			'searchingCity' => $link->Location->searchingCity,
  			'destinationCode' => $link->Location->destinationCode,
  			'destinationId' => $link->Location->destinationId,
  			'location' => $link->Location->location,
  			'address' => $link->Location->address,
  			'zip' => $link->Location->zip,
  			'longitude' => $link->Location->longitude,
  			'latitude' => $link->Location->latitude
  		];
		$RefPoints = [
			'type' => $link->RefPoints->type,
			'typeId' => $link->RefPoints->typeId,
			'name' => $link->RefPoints->name,
			'airportCode' => $link->RefPoints->airportCode,
			'direction' => $link->RefPoints->direction,
			'distance' => $link->RefPoints->distance,
			'unit' => $link->RefPoints->unit
		];
		$VoucherRemark = $link->VoucherRemark->VoucherRemark;
		$ShortDescription = $link->VoucherRemark->ShortDescription;
		$LongDescription = $link->VoucherRemark->LongDescription;
		$Images = [
			'type' => $link->Images->type,
			'path' => $link->Images->path
		];
		$Amenities = [
			'amenityID' => $link->Amenities->amenityID,
			'name' => $link->Amenities->name
		];
		$RoomType = [
			'hotelID' => $link->RoomType->hotelID,
			'roomID' => $link->RoomType->roomID,
			'name' => $link->RoomType->name,
			'maxGuest' => $link->RoomType->maxGuest,
			'roomTypeCategory' => $link->RoomType->roomTypeCategory,
			'roomTypeCategoryId' => $link->RoomType->roomTypeCategoryId
		];
		$Facilities = [
			'facilityId' => $link->Facilities->facilityId,
			'name' => $link->Facilities->name
		];
		return $Hotel.$Location.$RefPoints.$VoucherRemark.$ShortDescription.$LongDescription.$Images.$Amenities.$RoomType.$Facilities;
  	}
	function CheckAvailabilityAndPrices($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->CheckAvailabilityAndPrices($this->convertParamsIntoTouricoParams($params));
  	return $this->returnCheckAvailabilityAndPrices($result);
	}

	function returnCheckAvailabilityAndPrices($touricoResult) {
		$link = $touricoResult->envelop;
  		$Hotel = [
  		'brandId' => $link->Hotel->brandId,
  		'brandName' => $link->Hotel->brandName, 
  		'category' => $link->Hotel->category,
  		'PropertySubType' => $link->Hotel->PropertySubType,
  		'NumofRoom' => $link->Hotel->NumofRoom,
  		'bestValue' => $link->Hotel->bestValue,
  		'HotelId' => $link->Hotel->HotelId,
  		'provider (Name)' => $link->Hotel->provider (Name),
  		'name (Hotel)' => $link->Hotel->name (Hotel),
  		'thumb' => $link->Hotel->thumb,
  		'currency' => $link->Hotel->currency,
  		'minAverPrice' => $link->Hotel->minAverPrice,
  		'starsLevel' => $link->Hotel->starsLevel,
  		'desc' => $link->Hotel->desc,
  		'MinAverPublishPrice' => $link->Hotel->MinAverPublishPrice,
  		'PropertyType' => $link->Hotel->PropertyType
		];
		
		$Location = [
		'countryCode' => $link->Location->countryCode,
		'stateCode' => $link->Location->stateCode,
		'city' => $link->Location->city,
		'searchingState' => $link->Location->searchingState,
		'location' => $link->Location->location,
		'address' => $link->Location->address,
		'longitude' => $link->Location->longitude,
		'latitude' => $link->Location->latitude
		];
		$rt = 'name (Room Type)';
		$RoomType = [
		'NumOfBathrooms' => $link->RoomType->NumOfBathrooms,
		'roomTypeCategory' => $link->RoomType->roomTypeCategory,
		'roomTypeCategoryId' => $link->RoomType->roomTypeCategoryId,
		'nights' => $link->RoomType->nights,
		'name (Room Type)' => $link->RoomType->$rt,
		'productId' => $link->RoomType->productId,
		'startDate' => $link->RoomType->startDate,
		'hotelRoomTypeId' => $link->RoomType->hotelRoomTypeId,
		'roomId' => $link->RoomType->roomId,
		'isAvailable' => $link->RoomType->isAvailable
		];
		
		$AvailabilityBreakdown = [
		'offset' => $link->AvailabilityBreakdown->offset,
		'status (Availability)' => $link->AvailabilityBreakdown->status (Availability)
		];
		
		$Discount = [
		'from' => $link->Discount->from,
		'to' => $link->Discount->to
		];
		
		$Occupancy = [
		'taxPublish' => $link->Occupancy->taxPublish,
		'occupPublishPrice' => $link->Occupancy->occupPublishPrice,
		'occupId' => $link->Occupancy->occupId,
		'avrNightPublishPrice' => $link->Occupancy->avrNightPublishPrice,
		'occupPrice' => $link->Occupancy->occupPrice,
		'maxChild' => $link->Occupancy->maxChild,
		'maxGuests' => $link->Occupancy->maxGuests,
		'tax' => $link->Occupancy->tax,
		'avrNightPrice' => $link->Occupancy->avrNightPrice,
		'bedding' => $link->Occupancy->bedding,
		'isPublish' => $link->Occupancy->isPublish
		];
		
		$PriceBreakdown = [
		'offset' => $link->PriceBreakdown->offset,
		'value' => $link->PriceBreakdown->value,
		'valuePublish' => $link->PriceBreakdown->valuePublish
		];
		
		$Rooms =[
		'seqNum' => $link->Rooms->seqNum,
		'AdultNum' => $link->Rooms->AdultNum,
		'ChildNum' => $link->Rooms->ChildNum,
		'ChildAge' => $link->Rooms->ChildAge
		];
		
		$Supplement = [
		'type' => $link->Supplement->type,
		'suppId' => $link->Supplement->suppId,
		'supptType' => $link->Supplement->supptType,
		'supplsMandatory' => $link->Supplement->supplsMandatory,
		'suppChargeType' => $link->Supplement->suppChageType,
		'price' => $link->Supplement->price,
		'publishPrice' => $link->Supplement->publishPrice
		];
		
		$Boardbase = [
		'bbId' => $link->Boardbase->bbId,
		'bbName' => $link->Boardbase->bbName,
		'bbPrice' => $link->Boardbase->bbPrice,
		'bbPublishPrice' => $link->Boardbase->bbPublishPrice
		];
		return $Hotel.$Location.$RoomType.$AvailabilityBreakdown.$Discount.$Occupancy.$PriceBreakdown.$Rooms.$Supplement.$Boardbase ;
	}
	
	function BookHotelV3($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->BookHotelV3($this->convertParamsIntoTouricoParams($params));
  	return $this->returnBookHotelV3($result);
	}

	function returnBookHotelV3($touricoResult) {
		$link = $touricoResult->envelop;
		$ResGroup = [
		'tranNum' => $link->ResGroup->tranNum,
		'rgRemark' => $link->ResGroup->rgRemark,
		'rgld' => $link->ResGroup->rgld,
		'isPackage' => $link->ResGroup->isPackage,
		'currency' => $link->ResGroup->currency,
		'totalPrice' => $link->ResGroup->totalPrice,
		'xmlns' => $link->ResGroup->xmlns
		];
		$Reservation = [
		'reservationId' => $link->Reservation->reservationId,
		'fromDate' => $link->Reservation->fromDate,
		'toDate' => $link->Reservation->toDate,
		'totalTax' => $link->Reservation->totalTax,
		'price' => $link->Reservation->price,
		'isPublish' => $link->Reservation->isPublish,
		'currency' => $link->Reservation->currency,
		'status' => $link->Reservation->status,
		'numOfAdults' => $link->Reservation->numOfAdults,
		'numOfChildren' => $link->Reservation->numOfChildren,
		'note' => $link->Reservation->note,
		'tranNum' => $link->Reservation->tranNum
		];
		return $ResGroup.$Reservation;
	}
	function CostAmend($params) {

	 $client = new SoapClient($this->baseUrl);
	 $result = $client->CostAmend($this->convertParamsIntoTouricoParams($params));
 	return $this->returnCostAmend($result);
	}

	function returnCostAmend($touricoResult) {
 	$link = $touricoResult->envelop;
 
	 $ResGroup = [
   
   'rgID' => $link->ResGroup->rgID,
   'rgIdRefNum' => $link->ResGroup->rgIdRefNum,   
	 ];
 
	 $ReservationResType = [
   
   'reservationId' => $link->ReservationResType->reservationId,
   'fromDate' => $link->ReservationResType->fromDate,
   'toDate' => $link->ReservationResType->toDate,
   'amendmentPrice' => $link->ReservationResType->amendmentPrice,
   'type' => $link->ReservationResType->type,
   'currency' => $link->ReservationResType->currency,
   'status' => $link->ReservationResType->status,
   'note' => $link->ReservationResType->note,
   'tranNum' => $link->ReservationResType->tranNum,
   'agentRefNum' => $link->ReservationResType->agentRefNum   
	 ];
 
 	$HotelExtraInfo = [
   
   'hotelID' => $link->HotelExtraInfo->hotelID,
   'name' => $link->HotelExtraInfo->name,
   'stars' => $link->HotelExtraInfo->stars,
   'hotelPhone' => $link->HotelExtraInfo->hotelPhone,
   'hotelFax' => $link->HotelExtraInfo->hotelFax,
   'provider' => $link->HotelExtraInfo->provider,
   'PropertyType' => $link->HotelExtraInfo->PropertyType,
   'PropertySubType' => $link->HotelExtraInfo->PropertySubType,   
 ];
 
 $RoomExtraInfo = [
   
   'roomId' => $link->RoomExtraInfo->hotelID,
   'roomTypeCategoryId' => $link->RoomExtraInfo->name,
   'roomtypeCategory' => $link->RoomExtraInfo->stars,
   'name' => $link->RoomExtraInfo->hotelPhone,
   'dblBed' => $link->RoomExtraInfo->hotelFax,
   'occupId' => $link->RoomExtraInfo->provider,
   'NumOfBathrooms' => $link->RoomExtraInfo->PropertyType   
 ];
 $boardbase = [
    
   'id' => $link->boardbase->id,
   'name' => $link->boardbase->name,
   'price' => $link->boardbase->price
 ];
 $Supplements = [
 
   'Supplement' => $link->boardbase->Supplement,
   'SupplementAge' => $link->boardbase->SupplementAge
 ];
 $roomInfo = [
 
   'AdultNum' => $link->roomInfo->AdultNum,
   'ChildNum' => $link->roomInfo->ChildNum,
   'ChildAges' => $link->roomInfo->ChildAges
 ];
 $hotelRoomTypeId = [
 
   'hotelRoomTypeId' => $link->hotelRoomTypeId->AdultNum
 ];
 $Passenger = [
 
   'firstName' => $link->Passenger->AdultNum,
   'MiddleName' => $link->Passenger->ChildNum,
   'lastName' => $link->Passenger->lastName,
   'homePhone' => $link->Passenger->homePhone,
   'mobilePhone' => $link->Passenger->mobilePhone,
   'ageGroup' => $link->Passenger->ageGroup
 ];
 $OrigPolicy = [
 
   'HotelPolicy' => $link->OrigPolicy->HotelPolicy,
   'RoomTypePolicy' => $link->OrigPolicy->RoomTypePolicy,
   'CancelPolicy' => $link->OrigPolicy->CancelPolicy,
   'CancelPenaltyType' => $link->OrigPolicy->CancelPenaltyType,
   'DeadLine' => $link->OrigPolicy->DeadLine
 ];
 $NewPolicy = [
 
   'HotelPolicy' => $link->NewPolicy->HotelPolicy,
   'RoomTypePolicy' => $link->NewPolicyPolicy->RoomTypePolicy,
   'CancelPolicy' => $link->NewPolicyPolicy->CancelPolicy,
   'CancelPenaltyType' => $link->NewPolicyPolicy->CancelPenaltyType,
   'DeadLine' => $link->NewPolicyPolicy->DeadLine
 ];
 $Billing = [
 
   'OrigPrice' => $link->Billing->OrigPrice,
   'NewPrice' => $link->Billing->NewPrice,
   'Paid' => $link->Billing->Paid,
   'Balance' => $link->Billing->Balance
 ];
 
 return $ResGroup.$ReservationResType.$HotelExtraInfo.$RoomExtraInfo.$boardbase.$Supplements.$roomInfo.$hotelRoomTypeId.$Passenger.$OrigPolicy.$NewPolicy.$Billing;
 }
 


	function GetRGInfo($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetRGInfo($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetRGInfo($result);
	}

	function returnGetRGInfo($touricoResult) {
		$link = $touricoResult->envelop;
		$ResGroup = [
		'RGID' => $link->ResGroup->RGID,
		'isPackage' => $link->ResGroup->isPackage,
		'totalPrice' => $link->ResGroup->totalPrice,
		'currency' => $link->ResGroup->currency
		];
		$Reservation = [
		'reservationId' => $link->Reservation->reservationId,
		'fromDate' => $link->Reservation->fromDate,
		'toDate' => $link->Reservation->toDate,
		'totalTax' => $link->Reservation->totalTax,
		'price' => $link->Reservation->price,
		'currency' => $link->Reservation->currency,
		'status' => $link->Reservation->status,
		'numOfAdults' => $link->Reservation->numOfAdults,
		'numOfChildren' => $link->Reservation->numOfChildren,
		'note' => $link->Reservation->note,
		'tranNum' => $link->Reservation->tranNum
		];
		return $ResGroup.$Reservation;
	}
	
	
	
	
	
	
	
	
}

?>