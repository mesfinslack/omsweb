import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsAdvertsComponent } from './news-adverts.component';

describe('NewsAdvertsComponent', () => {
  let component: NewsAdvertsComponent;
  let fixture: ComponentFixture<NewsAdvertsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NewsAdvertsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NewsAdvertsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
