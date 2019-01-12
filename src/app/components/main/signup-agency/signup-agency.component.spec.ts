import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SignupAgencyComponent } from './signup-agency.component';

describe('SignupAgencyComponent', () => {
  let component: SignupAgencyComponent;
  let fixture: ComponentFixture<SignupAgencyComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SignupAgencyComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SignupAgencyComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
