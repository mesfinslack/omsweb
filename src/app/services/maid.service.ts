//import { Http } from '@angular/http';

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
//import 'rxjs/add/operator/map';
//import {observable, of} from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})



export class MaidService  {
//export class MaidService extends DataService
  currentuser = JSON.parse(localStorage.getItem('login'));
 checkMe:any;
  maids;

  constructor(private http: HttpClient) {
  //  super('http://jsonplaceholder.typicode.com/posts', http);
   }

  
   allavailablemaid2(){	
     console.log("this is allavailablemaid2  method ");
 return this.http.get("http://localhost/server/api2/allavailablemaid.php").pipe(map(res=>{
  this.checkMe = res;
  if(this.checkMe._body !== "0"){
     return res
  }
}));
  };


  getmaid(id){
    
    console.log("get maid" );
    return this.http.post("http://localhost/server/api2/selectone.php/",{'id':id}).pipe(map(res=>{
      this.checkMe = res;
      console.log(res);
      if(this.checkMe._body !== "0"){
         return res
         console.log(res);
      }
    }));
      };















 
  /* //////////////////////////////////////
  getmaids(){
    return this._http.get("http://localhost/api/select.php/")
      .map(res=>{
        this.checkMe = res;
       
        if(this.checkMe._body !== "0"){
           return res.json()
        } 
      });
  }
  addmaid(info){
    return this._http.post("http://localhost/api/insert.php",info)
      .map(()=>"");
  }
 
  deletemaid(id){
    return this._http.post("http://localhost/api/delete.php/",{'id':id})
      .map(()=>this.getEmployees());
  }
  updatemaid(info){
    return this._http.post("http://localhost/api/update.php/", info)
      .map(()=>"");
  }
*/
/////CUSTOMER ANGULARJS CONTROLLER
/////CUSTOMER ANGULARJS CONTROLLER
/////CUSTOMER ANGULARJS CONTROLLER


/*
getcurrentuser(){
 let currentuser = JSON.parse(localStorage.getItem('login'));
    };
  

getmaids(){	
    console.log("are you agency");
   if(this.currentuser.usertype=="agency"){
      return this.http.post("http://localhost/server/api2/maidsinyouragency.php/",this.currentuser)
      .map(res=>{
        this.checkMe = res;
        if(this.checkMe._body !== "0"){
          this.maids=res.json()
          console.log(this.maids );
           return res.json()
        } 
      });
    }
    };
  
  
 allmaid(){	
     this.http.get('../server/api2/allmaid.php').then(function(response){
        $scope.maids = response.data;
      });
    };
  
   
   
  searchmaid(info){
      $http.get('../server/api2/searchmaid.php',info).then(function(response){
        $scope.maids = response.data;
      });
    };

  addmaid(info){
      info.maidagencyid = $scope.currentuser.id;
      info.maidagency = $scope.currentuser.username;
  
      $http.post('../server/api2/insert.php', info).then(function(response){
        window.location.href = 'http://localhost/OMSWEB/client/#/maids';
      });
    };

  showmaid(){
      var id = $routeParams.id;
      $http.post('../server/api2/selectone.php',{'id':id}).then(function(response){
        var maid  = response.data;
        $scope.maid = maid[0];
      });
    };

   updatemaid(info){
      $http.post('../server/api2/update.php', info).then(function(response){
        window.location.href = 'http://localhost/OMSWEB/client/#/maids';
      });
    };

    deletemaid(id){
      var id = id;
      $http.post('../server/api2/delete.php',{'id':id}).then(function(response){
        $route.reload();
      });
    };	
  
  
  
  
    requested=false;
  
  maidrequests(){
      if(this.currentuser.usertype=="agency"){
      var info =this.currentuser;
      $http.post('../server/api2/maidrequests.php',info).then(function(response){
        let maidrequests = response.data;
      });
    }
    };
    
    checkrequested(){
        var id = $routeParams.id;
        console.log(id);
      var currentuser = JSON.parse(localStorage.getItem('login'));
      if(currentuser.usertype=="customer"){	
        var customerid=currentuser.id;	
      $http.post('../server/api2/checkrequested.php',{'maidid':id,'customerid':customerid}).then(function(response){
        var request = response.data;
        if(request){
            $scope.requested=true;
        }
      });
    }
    };
  
  
    acceptrequest(request){
        var info={ id:request.id,customerid:request.customerid, respond:'accepted',maidname:request.maidname,customername:request.customername};
      $http.post('../server/api2/response.php',info).then(function(response){
      $route.reload();
      var request = response.data;
      console.log(request);
      });
    };
     
    rejectrequest(request){
        var info={ id:request.id,customerid:request.customerid, respond:'rejected',maidname:request.maidname,customername:request.customername};
      $http.post('../server/api2/response.php',info).then(function(response){		
      $route.reload();
      var request = response.data;
      console.log(request);
      });
    };	
  
    requestmaid(mid){
      var maidid = mid;
      var currentuser = JSON.parse(localStorage.getItem('login'));
  
      if(currentuser.usertype=="customer"){	
      console.log("you are customer");
      var customerid=currentuser.id;						
         $http.post('../server/api2/requestmaid.php',{'maidid':maidid,'customerid':customerid}).then(function(response){			
        var result  = response.data;
        console.log(result);
        $route.reload();
      });	
      }
      else{
      console.log("you are not customer")
      }
    };	
  
    cancelrequestmaid(mid){
      var maidid = mid;
      var currentuser = JSON.parse(localStorage.getItem('login'));
  
      if(currentuser.usertype=="customer"){	
      console.log("you are customer");
      var customerid=currentuser.id;	
      console.log(customerid);						
         $http.post('../server/api2/cancelrequestmaid.php',{'maidid':maidid,'customerid':customerid}).then(function(response){			
        var result  = response.data;
        console.log(result);
        $route.reload();
      });	
      }
      else{
      console.log("you are not customer");
      }
    };	
  
    showacceptedmaid(){
      var id = $routeParams.id;
        console.log(id);
      $http.post('../server/api2/acceptedmaid.php',{'id':id}).then(function(response){
        var acceptedmaid  = response.data;
        $scope.acceptedmaid = acceptedmaid[0];
        console.log($scope.acceptedmaid);
      });
    };
    
    showacceptedcustomer(){
      var id = $routeParams.id;
        console.log(id);
      $http.post('../server/api2/acceptedcustomer.php',{'id':id}).then(function(response){
        var acceptedcustomer  = response.data;
        $scope.acceptedcustomer = acceptedcustomer[0];
        console.log($scope.acceptedcustomer);
      });
    };

    showacceptedrequest(){
      var id = $routeParams.id;
        console.log(id);
      $http.post('../server/api2/acceptedrequest.php',{'id':id}).then(function(response){
        var acceptedrequest  = response.data;
        $scope.acceptedrequest = acceptedrequest[0];
  
        console.log($scope.acceptedrequest);
      });
    };
  
    assignmaid(acceptedrequest){
        console.log(acceptedrequest);
      $http.post('../server/api2/assignmaid.php',acceptedrequest).then(function(response){
        var result  = response.data;
  
        window.location.href = 'http://localhost/OMSWEB/client/#/maids';
        console.log(result);
      });
    };
  
    assignedmaid(){
      if($scope.currentuser.usertype=="agency"){
      var info = $scope.currentuser;
      $http.post('../server/api2/assignedmaid.php',info).then(function(response){
        $scope.assignedmaids = response.data;
      });
    }
    };
  
  returnmaid(mid){
        console.log(mid);
      $http.post('../server/api2/returnmaid.php',{'mid':mid}).then(function(response){
        var result  = response.data;
  
        window.location.href = 'http://localhost/OMSWEB/client/#/maids';
        console.log(result);
      });
    };
  



*/


}
