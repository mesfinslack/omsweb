import { TestBed } from '@angular/core/testing';

import { MaidService } from './maid.service';

describe('MaidService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: MaidService = TestBed.get(MaidService);
    expect(service).toBeTruthy();
  });
});
