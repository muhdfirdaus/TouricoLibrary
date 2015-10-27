<?php 

require '../vendor/autoload.php';
require '../lib/hotel.php';

class Car{

 protected $baseUrl;

 function __constructor($settings) {
 $this->baseUrl = $settings->testEnvironment == true ? 
   "http://test.demo-carws.touricoholidays.com/CarWebService.svc?wsdl"
 :
   "http://demo-carws.touricoholidays.com/CarWebService.svc?wsdl"
 ;
 }
 
 function SearchCars($params)
 {
  $client = new soapClient($this->baseUrl);
  $result = $client -> SearchCars($this->convertParamsIntoTouricoParams($params));
  return $this->returnSearchCars($result);
 }
 
 function returnSearchCars($touricoResult)
 {
  $link = $touricoResult->envelop;
 
  $d = 'date';
  $SearchParameters = [
  
   'id'   => $link->SearchParameters->id,
   'date' => $link->SearchParameters->$d,
   'hour' => $link->SearchParameters->hour
  ];
  
  $CarResults = [
   
   'Car' => $link->CarResults->Car,
  ];
  
  
  $tc = 'type (Car)';
  $cc = 'currency (Car)';
  $sc = 'status (Car)';
  $pc = 'productId (Car)';
  $Car = [
  
   'carCompanyId' => $link->SearchParameters->carCompanyId,
   'carCompanyName' => $link->SearchParameters->carCompanyName,
   'carName' => $link->SearchParameters->carName,
   'carId' => $link->SearchParameters->idcarId,
   'adapterCode' => $link->SearchParameters->adapterCode,
   'carThummb' => $link->SearchParameters->carThummb,
   'class' => $link->SearchParameters->class,
   'trammision' => $link->SearchParameters->trammision,
   'ac' => $link->SearchParameters->ac,
   'type(Car)' => $link->SearchParameters->$tc,
   'maxPassengers' => $link->SearchParameters->maxPassengers,
   'doors' => $link->SearchParameters->doors,
   'luggageLarge' => $link->SearchParameters->luggageLarge,
   'luggageSmall' => $link->SearchParameters->luggageSmall,
   'currency(Car)' => $link->SearchParameters->$cc,
   'status(Car)' => $link->SearchParameters->$sc,
   'productId(Car)' => $link->SearchParameters->$pc,
   'minAvgPrice' => $link->SearchParameters->minAvgPrice,
   'minPrice' => $link->SearchParameters->minPrice
  ];
  
  $RouteStations = [
  
   'Stations' => $link->RouteStations->Stations,
  ];
  
  $ic ='id (CarStation)';
  $nc = 'name (CarStation)';
  $ac = 'address (CarStation)';
  $CarStation = [
  
   'id(CarStation)' => $link->CarStation->$ic,
   'name(CarStation)' => $link->CarStation->$nc,
   'address(CarStation)' => $link->CarStation->$ac,
   'phone' => $link->CarStation->phone,
   'operationHoursPickup' => $link->CarStation->operationHoursPickup,
   'operationHoursDropOff' => $link->CarStation->operationHoursDropOff,
   'minPrice' => $link->CarStation->minPrice
  ];
  
  return $SearchParameters.$CarResults.$Car.$RouteStations.$CarStation;
   
 }
 
 function SearchCarsByAirportCode($params){
 	$client = new soapClient($this->baseUrl);
 	$result = $client -> SearchCarsByAirportCode($this->convertParamsIntoTouricoParams($params));
 	return $this->returnSearchCarsByAirportCode($result);
 }
 
 function returnSearchCarsByAirportCode($touricoResult){
 		
 	$link = $touricoResult->envelop;
 		
 	$d = 'date';
 	$SearchParameters = [
 				
 			'id'   => $link->SearchParameters->id,
 			'date' => $link->SearchParameters->$d,
 			'hour' => $link->SearchParameters->hour
 	];
 		
 	$CarResults = [
 
 			'Car' => $link->CarResults->Car
 	];
 		
 	$SearchCarInfo = [
 				
 			'carCompanyId' => $link->SearchCarInfo->carCompanyId,
 			'carCompanyName' => $link->SearchCarInfo->carCompanyName,
 			'carName' => $link->SearchCarInfo->carName,
 			'carID' => $link->SearchCarInfo->carID,
 			'adapterCode' => $link->SearchCarInfo->adapterCode,
 			'carThumb' => $link->SearchCarInfo->carThumb,
 			'class' => $link->SearchCarInfo->class,
 			'transmission' => $link->SearchCarInfo->transmission,
 			'ac' => $link->SearchCarInfo->ac,
 			'type' => $link->SearchCarInfo->type,
 			'maxPassenger' => $link->SearchCarInfo->maxPassenger,
 			'doors' => $link->SearchCarInfo->doors,
 			'luggageLarge' => $link->SearchCarInfo->luggageLarge,
 			'luggageSmall' => $link->SearchCarInfo->luggageSmall,
 			'currency' => $link->SearchCarInfo->currency,
 			'status' => $link->SearchCarInfo->status,
 			'productId' => $link->SearchCarInfo->productId,
 			'minAvgPrice' => $link->SearchCarInfo->minAvgPrice,
 			'minPrice' => $link->SearchCarInfo->minPrice
 	];
 		
 	$RouteStations = [
 				
 			'Stations' => $link->RouteStations->Stations
 	];
 		
 	$PickUpStation = [
 				
 			'id' => $link->PickUpStation->id,
 			'name' => $link->PickUpStation->name,
 			'address' => $link->PickUpStation->address,
 			'phone' => $link->PickUpStation->phone,
 			'operationHoursDropOff' => $link->PickUpStation->operationHoursDropOff
 	];
 		
 	$DropOffStation = [
 
 			'id' => $link->DropOffStation->id,
 			'name' => $link->DropOffStation->name,
 			'address' => $link->DropOffStation->address,
 			'phone' => $link->DropOffStation->phone,
 			'operationHoursDropOff' => $link->DropOffStation->operationHoursDropOff
 	];
 		
 	$ProgramList = [
 				
 			'minPrice' => $link->ProgramList->minPrice
 	];
 		
 	$CarProgram = [
 				
 			'name' => $link->CarProgram->name,
 			'id' => $link->CarProgram->id,
 			'price' => $link->CarProgram->price,
 			'currency' => $link->CarProgram->currency
 	];
 		
 	$Component = [
 				
 			'name' => $link->Component->name,
 			'id' => $link->Component->id,
 			'desc' => $link->Component->desc
 	];
 		
 	$MandatoryFeesDueAtPickup = [
 				
 			'price' => $link->MandatoryFeesDueAtPickup->price,
 			'currency' => $link->MandatoryFeesDueAtPickup->currency
 	];
 		
 	return $SearchParameters.$CarResults.$SearchCarInfo.$RouteStations.$PickUpStation.$DropOffStation.$ProgramList.$CarProgram.$Component.$MandatoryFeesDueAtPickup;
 		
 }
 
 function SelectStations($params){
 	$client = new soapClient($this->baseUrl);
 	$result = $client -> SelectStations($this->convertParamsIntoTouricoParams($params));
 	return $this->returnSelectStations($result);
 }
 
 function returnSelectStations($touricoResult){
 		
 	$link = $touricoResult->envelop;
 		
 	$ProgramList = [
 				
 			'carProgram' => $link->ProgramList->carProgram,
 			'ProgramIncludes' => $link->ProgramList->ProgramIncludes,
 			'Component' => $link->ProgramList->Component
 	];
 		
 	$ncp = 'name (CarProgram)';
 	$idc = 'id (CarProgram)';
 	$pcp = 'price (CarProgram)';
 	$ccp = 'currency (CarProgram)';
 	$CarProgram = [
 				
 			'name (CarProgram)' => $link->CarProgram->$ncp,
 			'id (CarProgram)' => $link->CarProgram->$idc,
 			'price (CarProgram)' => $link->CarProgram->$pcp,
 			'currency (CarProgram)' => $link->CarProgram->$ccp
 	];
 		
 	$ProgramIncludes = [
 				
 			'Component' => $link->ProgramIncludes->Component
 	];
 		
 	$na = 'name (Component)';
 	$ia = 'id (Component)';
 	$dc = 'desc (Component)';
 	$Component = [
 				
 			'name (Component)' => $link->Component->$na,
 			'id (Component)' => $link->Component->$ia,
 			'desc (Component)' => $link->Component->$dc
 				
 	];
 		
 	$MandatoryFeesDueAtPickup = [
 				
 			'price' => $link->MandatoryFeesDueAtPickup->price,
 			'currency' => $link->MandatoryFeesDueAtPickup->currency
 	];
 		
 	return $ProgramList.$CarProgram.$ProgramIncludes.$Component.$MandatoryFeesDueAtPickup;
 }
 
 function GetRulesAndRestrictions($params){
 	$client = new soapClient($this->baseUrl);
 	$result = $client -> GetRulesAndRestrictions($this->convertParamsIntoTouricoParams($params));
 	return $this->returnGetRulesAndRestrictions($result);
 }
 
 function returnGetRulesAndRestrictions($touricoResult){
 		
 	$link = $touricoResult->envelop;
 		
 	$Rules = [
 				
 			'carCompanyID' => $link->Rules->carCompanyID,
 			'carCompanyName' => $link->Rules->carCompanyName,
 			'carCompanyLogoUrl' => $link->Rules->carCompanyLogoUrl
 	];
 		
 	$idr = 'id (Rule)';
 	$Rule = [
 				
 			'id (Rule)' => $link->Rule->$idr,
 			'title' => $link->Rule->title
 	];
 		
 	return $Rules.$Rule;
 		
 }
 function BookCar($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->BookCar($this->convertParamsIntoTouricoParams($params));
  	return $this->returnBookCar($result);
	}

	function returnBookCar($touricoResult) {
		$link = $touricoResult->envelop;
		$RGID = $link->ResGroup (Cars)->reservationID;
		$ReservationID = $link->Reservation (Cars)->reservationID; 
		$Status = [
 		'Confirm (Reservation)' => $link->Reservation (Cars)->Confirm (Reservation),
 		'Request (Reservation)' => $link->Reservation (Cars)->Request (Reservation)
   		];
		$Pnr = $link->Pnr->pnr;
		$MandatoryFeesDueAtPickup  = [
		'price' => $link->MandatoryFeesDueAtPickup ->price,
		'currency' => $link->MandatoryFeesDueAtPickup ->currency
		];
		return $RGID.$ReservationID.$Status.$Pnr.$MandatoryFeesDueAtPickup;
	}
	function CancelCar($params) {

  		$client = new SoapClient($this->baseUrl);
  		$result = $client->CancelCar($this->convertParamsIntoTouricoParams($params));
  		return $this->returnCancelCar($result);
	}

	function returnCancelCar($touricoResult) {
 		$link = $touricoResult->envelop;
		$tc = 'true (Cancellation)';
		$fc = 'false (Cancellation)';
		$CarCancellationResult = [
			'true (Cancellation)' => $link->CarCancellationResult->$tc,
			'false (Cancellation)' => $link->CarCancellationResult->$fc
		];
		return $CarCancellationResult;
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
		'currency' => $link->ResGroup->currency,
		'tranNum' => $link->ResGroup->tranNum,
		'rgidRefNumber' => $link->ResGroup->rgidRefNumber
		];
		$Reservation = [
		'reservationId' => $link->Reservation->reservationID,
		'pickUpDate' => $link->Reservation->pickUpDate,
		'pickUpTime' => $link->Reservation->pickUpTime,
		'toDate' => $link->Reservation->toDate,
		'pnr' => $link->Reservation->pnr,
		'tranNum' => $link->Reservation->tranNum,
		'agentRefNumber' => $link->Reservation->agentRefNumber,
		];
		$MandatoryFeesDueAtPickup  = [
		'price' => $link->MandatoryFeesDueAtPickup->price,
		'currency' => $link->MandatoryFeesDueAtPickup->currency
		];
		return $ResGroup.$Reservation.$MandatoryFeesDueAtPickup;
	}
 
 
 
 
 } 
 ?>