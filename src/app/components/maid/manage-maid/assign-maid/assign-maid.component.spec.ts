import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AssignMaidComponent } from './assign-maid.component';

describe('AssignMaidComponent', () => {
  let component: AssignMaidComponent;
  let fixture: ComponentFixture<AssignMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AssignMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AssignMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
