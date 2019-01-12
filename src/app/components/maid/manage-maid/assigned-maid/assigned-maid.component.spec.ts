import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AssignedMaidComponent } from './assigned-maid.component';

describe('AssignedMaidComponent', () => {
  let component: AssignedMaidComponent;
  let fixture: ComponentFixture<AssignedMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AssignedMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AssignedMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
