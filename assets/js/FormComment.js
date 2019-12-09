export default class FormComment {
	constructor(){
		this.form = document.querySelector('[name="comment"]');
		if(this.form) {
			this.init()
		}
	}

	init(){
		this.form.addEventListener('submit', this.submit.bind(this));
	}

	async submit(e) {
		e.preventDefault();
		const author = this.form.querySelector('[name="comment[author]"]').value;
		const message = this.form.querySelector('[name="comment[message]"]').value;
		const productId = this.form.querySelector('[name="comment[productId]"]').value;

		const request = new Request(`/products/${productId}/comment`, {
			method: 'post',
			headers: {
				'X-Requested-With' : 'XMLHttpRequest'
			},
			body: JSON.stringify({
				author: author,
				message: message,
				productId: productId
			})
		});

		const query = await fetch(request);
		const response = await query.json();

		this.displayComment(response.data);
	}

	displayComment(data){
		this.form.reset();

		let html = '';
		data.map( comment => {
			const now = new Date(comment.date.date);
			html += `
				<div class="border-bottom border-dark">
					<p class="small">${comment.author}</p>
					<p class="font-italic text-black-50">Ecrit le ${now.toLocaleDateString()} à ${now.toLocaleTimeString()}</p>
					<p>${comment.message}</p>
				</div>
			`;
		} );

		const listComments = document.querySelector('.list-comments');
		listComments.innerHTML = html;
	}
}







