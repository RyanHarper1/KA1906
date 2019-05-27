import { TestBed } from '@angular/core/testing';

import { ViewScriptService } from './view-script.service';

describe('ViewScriptService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ViewScriptService = TestBed.get(ViewScriptService);
    expect(service).toBeTruthy();
  });
});
