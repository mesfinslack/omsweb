import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SearchMaidComponent } from './search-maid.component';

describe('SearchMaidComponent', () => {
  let component: SearchMaidComponent;
  let fixture: ComponentFixture<SearchMaidComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SearchMaidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SearchMaidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
