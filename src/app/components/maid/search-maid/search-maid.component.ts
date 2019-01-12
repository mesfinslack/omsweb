import { Component, OnInit } from '@angular/core';
import { MaidService } from 'src/app/services/maid.service';


@Component({
  selector: 'app-search-maid',
  templateUrl: './search-maid.component.html',
  styleUrls: ['./search-maid.component.css']
})
export class SearchMaidComponent implements OnInit {
  filter: any;
    maids: any;
  constructor(private MaidService:MaidService ) { }

  ngOnInit() {
    this.allavailablemaid();
  }

  public  allavailablemaid(){
     this.MaidService.allavailablemaid2().subscribe(maids => this.maids = maids);  
}
}

