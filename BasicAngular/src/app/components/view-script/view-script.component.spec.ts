import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewScriptComponent } from './view-script.component';

describe('ViewScriptComponent', () => {
  let component: ViewScriptComponent;
  let fixture: ComponentFixture<ViewScriptComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ViewScriptComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewScriptComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
