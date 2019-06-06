import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ShareScriptSubscribeComponent } from './share-script-subscribe.component';

describe('ShareScriptSubscribeComponent', () => {
  let component: ShareScriptSubscribeComponent;
  let fixture: ComponentFixture<ShareScriptSubscribeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ShareScriptSubscribeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ShareScriptSubscribeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
