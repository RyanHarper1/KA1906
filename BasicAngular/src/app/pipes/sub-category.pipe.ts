import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'subCategory'
})
export class SubCategoryPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    return null;
  }

}
