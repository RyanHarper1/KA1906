import { Pipe, PipeTransform } from '@angular/core';
    @Pipe({ name: 'store' })
    export class StorePipe implements PipeTransform {
      transform(store: any, searchText: any): any {
        if(searchText == null) return store;

        return store.filter(function(store){
          return store.scriptName.toLowerCase().indexOf(searchText.toLowerCase()) > -1;
        })
      }
    }
