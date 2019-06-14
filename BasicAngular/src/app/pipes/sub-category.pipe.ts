import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'subCat'
})
export class SubCategoryPipe implements PipeTransform {

  transform(value: any, args?: any): any {
   if(args == null){
     return value;
    }
    return value.filter(
      list => list.subCategory.toLowerCase().indexOf(args.toLowerCase()) > -1
   );
  }

}
