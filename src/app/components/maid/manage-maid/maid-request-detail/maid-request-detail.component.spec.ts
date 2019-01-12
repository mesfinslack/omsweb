import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MaidRequestDetailComponent } from './maid-request-detail.component';

describe('MaidRequestDetailComponent', () => {
  let component: MaidRequestDetailComponent;
  let fixture: ComponentFixture<MaidRequestDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MaidRequestDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MaidRequestDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
