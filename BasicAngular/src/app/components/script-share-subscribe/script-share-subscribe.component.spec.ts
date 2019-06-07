import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ScriptShareSubscribeComponent } from './script-share-subscribe.component';

describe('ScriptShareSubscribeComponent', () => {
  let component: ScriptShareSubscribeComponent;
  let fixture: ComponentFixture<ScriptShareSubscribeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ScriptShareSubscribeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ScriptShareSubscribeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
