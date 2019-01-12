import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditMaidComponent } from './edit-maid.component';

describe('EditMaidComponent', () => {
  let component: EditMaidComponent;
  let fixture: ComponentFixture<EditMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
