import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MaidDetailComponent } from './maid-detail.component';

describe('MaidDetailComponent', () => {
  let component: MaidDetailComponent;
  let fixture: ComponentFixture<MaidDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MaidDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MaidDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
