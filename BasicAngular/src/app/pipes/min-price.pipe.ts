import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'minPrice'
})
export class MinPricePipe implements PipeTransform {

  transform(value: any, args?: any): any {
    return null;
  }

}
