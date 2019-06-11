import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'categoryPipe'
})

export class CategoryPipe implements PipeTransform {

 transform(value: any, args?: any): any {
  if(args == null){
    return value;
   }
   return value.filter(
     list => list.category.toLowerCase().indexOf(args.toLowerCase()) > -1
  );
 }

}
