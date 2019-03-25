import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BuildScriptComponent } from './build-script.component';

describe('BuildScriptComponent', () => {
  let component: BuildScriptComponent;
  let fixture: ComponentFixture<BuildScriptComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BuildScriptComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BuildScriptComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
