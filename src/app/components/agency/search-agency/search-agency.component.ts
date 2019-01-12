import { Component, OnInit } from '@angular/core';
import { AgencyService } from 'src/app/services/agency.service';

@Component({
  selector: 'app-search-agency',
  templateUrl: './search-agency.component.html',
  styleUrls: ['./search-agency.component.css']
})

export class SearchAgencyComponent implements OnInit {

    agencies: any;
  constructor(private AgencyService:AgencyService ) { }

  ngOnInit() {
    this.allavailableagencies();
  }

  public  allavailableagencies(){
     this.AgencyService.allavailableagencies2().subscribe(agencies => this.agencies = agencies);  
}
}

