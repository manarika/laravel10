## learning laravel 10 
## project idea
1. User can creat a new help ticket
2. Admin and user can replay on help ticket
3. Admin can reject or resolve the ticket
4. When admin update on the ticket then user will get one notification via email
that the ticket status is updated
5. User can give ticket title and description
6. User can upload a document like pdf or image

## Table structure
1. Tickets 
   - title(varchar) {required}
   - description(text) {required}
   - status(open{default},resolved,rejected) {required}
   - attachment(string) {nullable}
   - user_id(int)  {required} filled by laravel
   - status_changed_by_id(int) {nullable}


2. Replies 
   - body(text) {required}
   - user_id(int) {required} filled by laravel
   - ticket_id(int) {required} filled by laravel
