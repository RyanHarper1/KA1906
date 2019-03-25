import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ExampleScriptComponent } from './example-script.component';

describe('ExampleScriptComponent', () => {
  let component: ExampleScriptComponent;
  let fixture: ComponentFixture<ExampleScriptComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ExampleScriptComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ExampleScriptComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
