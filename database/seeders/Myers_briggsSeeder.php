<?php

namespace Database\Seeders;


use App\Models\Myers_briggs;
use Illuminate\Database\Seeder;

class Myers_briggsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1111";
        $myers_briggs->title = "Руководитель, управленец (экстраверт, сенсорик, логик, рационал).";
        $myers_briggs->discription = "
        К данному типу относятся очень работоспособные, социально-адаптированные люди, всегда чувствующие необходимость доводить начатое дело до конца. Они планируют деятельность и практически относятся к окружающим вещам. Склонны проявлять любовь и заботу о близких, любят шумные веселья и компании. Добродушны, но резковаты, могут быть вспыльчивыми и упертыми.
        11% мужчин
        6% женщин
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1112";
        $myers_briggs->title = "Непоседа, маршал, реалист (экстраверт, сенсорик, логик, иррационал).";
        $myers_briggs->discription = "
        Склонны применять физическую силу с целью достигнуть победы любой ценой. Препятствия только усиливают их желание выиграть. Любят руководить, не выносят подчинения.  Анализируют ситуацию, любят составлять конкретный план действий, четко ему следуют. Их внимание направлено на людей и мир объектов. Способны дать быстрый, точный, ценный, объективный и ясно выраженный ответ в любой ситуации.
        6% мужчин
        3% женщин                   
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1121";
        $myers_briggs->title = "Учитель, воспитатель, энтузиаст (экстраверт, сенсорик, этик, рационал).";
        $myers_briggs->discription = "
        Этот тип личности способен влиять на людей с помощью эмоционального давления, при этом он хорошо ладит с ними. Такие люди могут поднять настроение. Они склонны жертвовать собственными интересами ради другого человека и проявлять любовь и заботу о близких. В работе всего добиваются самостоятельно, любят, когда другие люди подчеркивают их достоинства.
        17% женщин
        8% мужчин             
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1122";
        $myers_briggs->title = "Аниматор, политик, деятель (экстраверт, сенсорик, этик, иррационал). ";
        $myers_briggs->discription = "
        Этот тип способен видеть возможности других, используя эти знания с целью манипуляции. Руководят более слабыми людьми, четко определяя их слабые места. Любят держать дистанцию в общении. Руководствуются собственными интересами. В глазах других пытаются выглядеть незаурядной оригинальной личностью, но часто такими не является. Они живут ради настоящего момента. Больше начинают, чем заканчивают. Сосредоточенность на немедленных результатах делает их нетерпимыми к разного рода процедурам, шаблонам и прочим препятствиям. 
        10% женщин
        7% мужчин                                              
        ";
        $myers_briggs->save();
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1211";
        $myers_briggs->title = "Командир, предприниматель (экстраверт, интуит, логик, рационал). ";
        $myers_briggs->discription = "
        Эти люди способны четко выделять собственные возможности и способности, легко вдохновляются и начинают новые дела, увлекаются динамичными видами спорта, которые дарят им экстремальные ощущения.  Чувствуют новые тенденции, идут на риск, полагаясь на интуицию. Они с уверенностью используют в работе новые технологии, глубоко анализируют себя и окружающий мир. Имеют позитивное мышление. Имеют потребность в контроле и необычные способности лидера. Для них жизнь раскрывается в борьбе, в споре, в схлестывании с окружающими во имя познания.
        3% мужчин
        1% женщин
        ";
        $myers_briggs->save();
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1212";
        $myers_briggs->title = "Изобретатель, искатель, мечтатель (экстраверт, интуит, логик, иррационал). ";
        $myers_briggs->discription = "
        Люди типа ENTP отличаются широким кругом интересов, умеют приспосабливаться к новым условиям и легко переходят к новым методам работы.  Являются генератором идей, не любят традиции и рутину. Они умеют объяснять сложные идеи, будучи в них первопроходцами. Склонны к синтезу в мышлении, создают новую идею из готовых составляющих. Их изобретательность постоянно ищет применения в самых различных профессиональных сферах. Людей этого типа больше привлекают новые идеи, они находятся в непрерывном напряжении деятельности.
        4% мужчин
        2% женщин
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1221";
        $myers_briggs->title = "Увещеватель, наставник (экстраверт, интуит, этик, рационал). ";
        $myers_briggs->discription = "
        Очень эмоциональные личности, склонные к эмпатии и проявлению широкого спектра эмоций. Обладают выразительной мимикой и красноречием. Способны предчувствовать разные события и готовиться к ним заранее. Часто они не уверены в любви партнера, склонны к ревности. Их внимание сосредоточено на тех, кто их окружает. Имеют способность к интуитивному постижению ситуации при внимательном и заботливом отношении к позиции всех участников.
        3% женщин
        2% мужчин        
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "1222";
        $myers_briggs->title = "Медиатор, чемпион (экстраверт, интуит, этик, иррационал).";
        $myers_briggs->discription = "
        Они способны тонко чувствовать других людей, обладают хорошо развитой фантазией. Любят творческую работу, не переносят однообразие и рутину. Общительны, любят давать дельные советы. Они воспринимают жизнь в разнообразии ее возможностей. Все это сопровождается активным взаимодействием с окружающим миром, а их любознательная позиция позволяет им ориентироваться в постоянной смене ситуаций.
        10% женщин
        6% мужчин                                        
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2111";
        $myers_briggs->title = "Организатор, инспектор (интроверт, сенсорик, логик, рационал).";
        $myers_briggs->discription = "
        Такие люди любят порядок и строгость, глубоко вникают в работу, анализируя информацию с разных сторон. Отличаются педантичностью. Реально смотрят на вещи, берутся за дело только если точно знают, что смогут его завершить. Вызывают доверие, но предпочитают короткие деловые контакты. У них хорошо развито чувство ответственности. Они ориентированы на конечный результат. 
        16% мужчин
        7% женщин
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2112";
        $myers_briggs->title = "Мастер, умелец (интроверт, сенсорик, логик, иррационал).";
        $myers_briggs->discription = "
        Главным источником познания мира для этого типа являются ощущения. Они проявляют эмпатию, тонко чувствуют и любят других людей, не переносят фальшь. Отличаются техническим складом ума, любят работать руками, при этом всегда укладываясь в нужные сроки. Сосредоточены на себе, склонны к объективности в принятии решений. Они анализируют ситуацию и выжидают, прежде чем сразу предлагать свое решение и бросаться в бой. Их взгляд на мир предельно конкретный.
        9% мужчин
        2% женщин                        
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2121";
        $myers_briggs->title = "Исполнитель, хранитель, защитник (интроверт, сенсорик, этик, рационал). ";
        $myers_briggs->discription = "
        Они распознают наигранность и фальшь в отношениях между людьми,  делят их на своих и чужих. Отстаивают свои интересы и принципы. Умеют постоять за себя и своих близких, не переносят морального превосходства других людей.  Умеют глубоко анализировать. Аккуратные, добродушные, приверженные порядку и в высшей степени исполнительные и заботливые. Люди с этим типом личности видят свое предназначение в том, чтобы помогать другим и делать их счастливее.
        19% женщин
        8% мужчин                           
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2122";
        $myers_briggs->title = "Придумщик, композитор (интроверт, сенсорик, этик, иррационал). ";
        $myers_briggs->discription = "
        Такие люди умеют наслаждаться жизнью, спокойно перенося однообразие и рутину. Легко уживаются с другими людьми, уважают их личное пространство, при этом требуя такого же отношения к себе. Любят шутить, развлекаться, избегают конфликтных ситуаций. Часто являются  помощниками, любят ощущать себя нужным и значимым в глазах других людей. Нежные и заботливые, открытые и подвижные, задумчивые и сдержанные, практичные и приземленные. Это люди, которым не хочется руководить. Они принимают мир таким, каков он есть и не стремятся переделать его.
        10% женщин
        8% мужчин                                                                      
        ";
        $myers_briggs->save();
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2211";
        $myers_briggs->title = "Аналитик, провидец, вдохновитель  (интроверт, интуит, логик, рационал). ";
        $myers_briggs->discription = "
        Люди с таким типом личности умеют отличать главное от второстепенного, не любят пустых разговоров, склонны к четкому практичному мышлению. В работе они любят использовать необычные идеи, при этом демонстрируя свою независимость. Используют интуицию там, где не знают точных ответов. Они не любят шумных компаний, ощущают трудности в налаживании отношений с другими людьми. Они всегда стремятся заканчивать все дела.
        3% мужчин
        1% женщин                   
        ";
        $myers_briggs->save();
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2212";
        $myers_briggs->title = "Архитектор, критик, аналитик (интроверт, интуит, логик, иррационал). ";
        $myers_briggs->discription = "
        Этот тип – эрудит с философским складом ума. Осторожен, принимает решение только с уверенностью в его правильности, анализируя прошлое в его связи с будущим.  Не любит бурных проявлений эмоций, ценит уют и комфорт. Такие люди стремятся к объективности и требуют тщательного анализа всей информации. Их непредвзятость и подвижность обеспечивает восприимчивость к неожиданным и новым фактам, какими бы они ни были. Они находятся в постоянном напряжении.
        5% мужчин
        2% женщин                         
        ";
        $myers_briggs->save();
        
        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2221";
        $myers_briggs->title = "Вдохновитель, консультант, советчик, гуманист (интроверт, интуит, этик, рационал). ";
        $myers_briggs->discription = "
        Этот тип тонко чувствует характер отношений между людьми, придает большое значение доверию, не прощает измен. Умеет выявлять скрытые способности других, наделен талантом воспитателя. Люди с таким типом личности увлекаются самообразованием, люди часто обращаются к ним за советом. Они очень ранимы, тяжело переносят агрессию и недостаток любви. Их движущая сила – интуиция.
        2% женщин
        1% мужчин                           
        ";
        $myers_briggs->save();

        $myers_briggs = new Myers_briggs();
        $myers_briggs->code = "2222";
        $myers_briggs->title = "Созерцатель, лирик, целитель (интроверт, интуит, этик, иррационал). ";
        $myers_briggs->discription = "
        Мечтательные и лирические, они умеют интуитивно прогнозировать события, хорошо разбираются в людях, любят и чувствуют их. Такие люди обладают хорошим чувством юмора и вызывают расположение других людей. Большое значение для них имеет внешний вид, как их, так и чей-либо чужой. Не умеют экономить. Во время работы любит делать частые и большие перерывы. Благодаря качествам интровертов, их размышления направлены на самих себя. 
        5% женщин
        4% мужчин                                                                 
        ";
        $myers_briggs->save();
    }
}