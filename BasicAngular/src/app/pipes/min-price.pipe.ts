import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'minPrice'
})
export class MinPricePipe implements PipeTransform {

  transform(value: any, args?: any): any {
    let [minPrice] = args;
    return value.filter(list => {
      return Number(list.price) >= minPrice;
    });
  }

}
