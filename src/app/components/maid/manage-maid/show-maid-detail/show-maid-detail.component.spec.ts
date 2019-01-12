import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShowMaidDetailComponent } from './show-maid-detail.component';

describe('ShowMaidDetailComponent', () => {
  let component: ShowMaidDetailComponent;
  let fixture: ComponentFixture<ShowMaidDetailComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShowMaidDetailComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShowMaidDetailComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
