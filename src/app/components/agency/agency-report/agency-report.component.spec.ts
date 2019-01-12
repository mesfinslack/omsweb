import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AgencyReportComponent } from './agency-report.component';

describe('AgencyReportComponent', () => {
  let component: AgencyReportComponent;
  let fixture: ComponentFixture<AgencyReportComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AgencyReportComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AgencyReportComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
