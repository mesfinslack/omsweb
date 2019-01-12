
//import { Http } from '@angular/http';

import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
//import 'rxjs/add/operator/map';
//import {observable, of} from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})



export class AgencyService  {
  currentuser = JSON.parse(localStorage.getItem('login'));
 checkMe:any;
  agencies;

  constructor(private http: HttpClient) {
  //  super('http://jsonplaceholder.typicode.com/posts', http);
   }

  
   allavailableagencies2(){	
     console.log("this is allavailablemaid2  method ");
 return this.http.get("http://localhost/server/api1/getavailableagencies.php").pipe(map(res=>{
  this.checkMe = res;
 
  console.log("service res before if");
  console.log(res);
  if(this.checkMe._body !== "0"){
    console.log("service res");
    console.log(res);
     return res
  }
}));
};
}