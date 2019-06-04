import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'rating'
})
export class RatingPipe implements PipeTransform {

  transform(value: any, args?: any): any {
   if(args == null){
     return value;
    }
    return value.filter(
      list => list.rating.toLowerCase().indexOf(args.toLowerCase()) > -1
   );
  }

}
