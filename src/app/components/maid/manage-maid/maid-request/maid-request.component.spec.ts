import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MaidRequestComponent } from './maid-request.component';

describe('MaidRequestComponent', () => {
  let component: MaidRequestComponent;
  let fixture: ComponentFixture<MaidRequestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MaidRequestComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MaidRequestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
