import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TopMaidsComponent } from './top-maids.component';

describe('TopMaidsComponent', () => {
  let component: TopMaidsComponent;
  let fixture: ComponentFixture<TopMaidsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TopMaidsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TopMaidsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
