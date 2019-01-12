import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowAgencyDetailComponent } from './show-agency-detail.component';

describe('ShowAgencyDetailComponent', () => {
  let component: ShowAgencyDetailComponent;
  let fixture: ComponentFixture<ShowAgencyDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShowAgencyDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowAgencyDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
