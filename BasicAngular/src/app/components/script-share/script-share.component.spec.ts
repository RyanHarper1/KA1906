import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ScriptShareComponent } from './script-share.component';

describe('ScriptShareComponent', () => {
  let component: ScriptShareComponent;
  let fixture: ComponentFixture<ScriptShareComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ScriptShareComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ScriptShareComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
