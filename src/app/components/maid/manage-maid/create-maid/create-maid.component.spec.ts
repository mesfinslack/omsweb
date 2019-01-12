import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateMaidComponent } from './create-maid.component';

describe('CreateMaidComponent', () => {
  let component: CreateMaidComponent;
  let fixture: ComponentFixture<CreateMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreateMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
