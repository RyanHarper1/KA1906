import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CurrentScriptsComponent } from './current-scripts.component';

describe('CurrentScriptsComponent', () => {
  let component: CurrentScriptsComponent;
  let fixture: ComponentFixture<CurrentScriptsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CurrentScriptsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CurrentScriptsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
