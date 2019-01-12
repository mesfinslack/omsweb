import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AgencyRequestDetailComponent } from './agency-request-detail.component';

describe('AgencyRequestDetailComponent', () => {
  let component: AgencyRequestDetailComponent;
  let fixture: ComponentFixture<AgencyRequestDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AgencyRequestDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AgencyRequestDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
