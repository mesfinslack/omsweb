
import { Component, OnInit } from '@angular/core';
import {ActivatedRoute, Params, Router} from '@angular/router';
import { MaidService } from 'src/app/services/maid.service';

@Component({
  selector: 'app-maid-detail',
  templateUrl: './maid-detail.component.html',
  styleUrls: ['./maid-detail.component.css']
})
export class MaidDetailComponent implements OnInit {
 maid:any;

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    private MaidService: MaidService
  ) { }

  ngOnInit() {
    this.getmaid();
  }
  employee;

  getmaid(){
    var id = this.route.snapshot.params['id'];
    this.MaidService
      .getmaid(id)
      .subscribe(maid =>{
          this.maid = maid[0];
          })
  };

  goBack(){
    this.router.navigate(['/searchMaid']);
  }
}
