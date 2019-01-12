import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListMaidComponent } from './list-maid.component';

describe('ListMaidComponent', () => {
  let component: ListMaidComponent;
  let fixture: ComponentFixture<ListMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
