"user strict"

const unit = document.querySelector('#controls__unit');
const exercise = document.querySelector('#controls__exercise');

const exercises = [
    ['01_Array1.php', '02_ArrayAsociativo.php', '03_Personas.php'],
    //['02_otro.php', '03_otromas.php']
];


document.querySelector('#btn_execute').addEventListener('click', () => {
    fetch(`load.php?loading_file=tema_${Number.parseInt(unit.value) + 1}/${exercise.value}`)
        .then(response => response.text())
        .then(console_text => {
            document.querySelector('.console__title').textContent = `Tema_${Number.parseInt(unit.value) + 1} - ${exercise.value}`;
            document.querySelector('.console__content').innerHTML = console_text;
        }).catch(error => {
            document.querySelector('.console__content').innerHTML = 'No se ha podido cargar el contenido';
        });
});

document.querySelector('#btn_clear').addEventListener('click', () => {
    document.querySelector('.console__title').textContent = '';
    document.querySelector('.console__content').textContent = '';
});

function load_units() {
    const fragment = document.createDocumentFragment();
    for (let i = 0; i < exercises.length; i++) {
        const option = document.createElement('OPTION');
        option.value = i;
        option.textContent = `Tema ${i + 1}`;
        fragment.append(option);
    }
    unit.append(fragment);
}

function load_exercises() {
    const unit_value = unit.value;
    const fragment = document.createDocumentFragment();
    for (let i = 0; i < exercises[unit_value].length; i++) {
        const option = document.createElement('OPTION');
        option.value = exercises[unit_value][i];
        option.textContent = exercises[unit_value][i];
        fragment.append(option);
    }
    exercise.textContent = '';
    exercise.append(fragment);
}

function initialize() {
    load_units();
    load_exercises();
    unit.addEventListener('change', load_exercises);
}

initialize();