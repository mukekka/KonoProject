let label = document.querySelector('label')

label.innerHTML = label.innerText.split('')
    .map((letters, i) => {
        return `<span
            style="transition-delay: ${i * 30}ms;  /*�ӳ�ִ��*/
            filter: hue-rotate(${i * 10}deg)";      /*��ɫ��ת�޸��ı�*/
        >
        ${ letters }
        </span>`
    }).join('')