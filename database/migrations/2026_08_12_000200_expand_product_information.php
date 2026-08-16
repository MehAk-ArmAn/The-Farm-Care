<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('benefits')->nullable()->after('features');
            $table->json('applications')->nullable()->after('benefits');
            $table->json('package_contents')->nullable()->after('applications');
            $table->longText('care_instructions')->nullable()->after('specifications');
            $table->longText('usage_notes')->nullable()->after('care_instructions');
        });

        foreach ($this->catalog() as $slug => $data) {
            DB::table('products')->where('slug', $slug)->update([
                'short_description' => $data['short_description'],
                'description' => $data['description'],
                'features' => json_encode($data['features'], JSON_UNESCAPED_UNICODE),
                'benefits' => json_encode($data['benefits'], JSON_UNESCAPED_UNICODE),
                'applications' => json_encode($data['applications'], JSON_UNESCAPED_UNICODE),
                'package_contents' => json_encode($data['package_contents'], JSON_UNESCAPED_UNICODE),
                'specifications' => json_encode($data['specifications'], JSON_UNESCAPED_UNICODE),
                'care_instructions' => $data['care_instructions'],
                'usage_notes' => $data['usage_notes'],
                'image' => $data['image'],
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['benefits', 'applications', 'package_contents', 'care_instructions', 'usage_notes']);
        });
    }

    private function catalog(): array
    {
        return [
            'bull-nose-rings' => [
                'short_description' => 'Heavy-duty brass and stainless-steel bull nose rings for controlled livestock handling, supplied with fitting screw and L-key options.',
                'description' => 'The Farm Care Bull Nose Rings are professional livestock-handling accessories intended for controlled handling of mature cattle and breeding bulls. The range includes brass and stainless-steel options selected for strength, corrosion resistance and dependable farm use. Models can be supplied with a sharp fitting screw and L-key/screwdriver arrangement depending on the selected pattern and size.',
                'features' => ['Brass and stainless-steel models', 'Strong polished metal construction', 'Screw-lock fitting system on applicable models', 'L-key / screwdriver supplied with applicable variants', 'Multiple diameter options for different requirements'],
                'benefits' => ['Provides a secure attachment point for controlled bull handling', 'Durable construction suited to repeated livestock use', 'Corrosion-resistant material options for farm environments', 'Multiple sizes help buyers select a suitable model'],
                'applications' => ['Cattle farms', 'Breeding operations', 'Livestock handling facilities', 'Veterinary and farm supply distributors'],
                'package_contents' => ['Bull nose ring', 'Fitting/cutting screw where applicable', 'L-key or screwdriver where applicable'],
                'specifications' => ['Material' => 'Brass or Stainless Steel', 'Available Sizes' => 'Approx. 2 in, 2.5 in, 3 in, 3.5 in and 4 in options', 'Finish' => 'Smooth polished metal', 'Application' => 'Livestock handling', 'Supply' => 'Retail, wholesale, distributor and OEM inquiries'],
                'care_instructions' => 'Clean and disinfect the ring and accessories before and after handling according to the farm or veterinary hygiene protocol. Dry metal parts thoroughly before storage.',
                'usage_notes' => 'Fitting and use should be carried out by experienced livestock handlers or veterinary professionals in accordance with animal-welfare requirements. Product sizing and exact supplied accessories may vary by model.',
                'image' => 'seed/bull-nose-ring.jpg',
            ],
            'sucking-prevention' => [
                'short_description' => 'Reusable milk-prevention and anti-suckling devices designed to support calf weaning and reduce unwanted cross-suckling.',
                'description' => 'Sucking Prevention devices are designed for calves and young cattle during controlled weaning and herd-management programs. The range includes metal and plastic patterns that attach at the nose and discourage nursing or cross-suckling while allowing the animal to continue normal feeding and drinking. Different models are available for farm preferences and buyer requirements.',
                'features' => ['Metal and plastic model options', 'Designed for calves and young cattle', 'Supports controlled weaning programs', 'Reusable farm-friendly construction', 'Different patterns and finishes available'],
                'benefits' => ['Helps reduce unwanted nursing after planned weaning', 'Helps control cross-suckling within young stock', 'Supports transition from milk to feed', 'Reusable design can reduce repeated consumable cost'],
                'applications' => ['Dairy calf management', 'Beef calf management', 'Weaning programs', 'Livestock breeding farms'],
                'package_contents' => ['Sucking-prevention device', 'Adjustment/fitting component depending on model'],
                'specifications' => ['Product Type' => 'Calf sucking-prevention / milk preventer', 'Material Options' => 'Stainless steel, brass, copper or plastic depending on model', 'Animal Type' => 'Calves and young cattle', 'Use' => 'Weaning and cross-suckling management', 'Supply' => 'Retail, wholesale and OEM inquiries'],
                'care_instructions' => 'Wash after use, remove organic residue and disinfect using a livestock-safe cleaning method. Inspect for sharp damage, deformation or loose adjustment parts before reuse.',
                'usage_notes' => 'Select a suitable size and model for the animal. The device is intended as a temporary herd-management aid rather than a permanent fitting. Animals should be monitored for fit, comfort and normal eating/drinking.',
                'image' => 'seed/sucking-prevention.jpg',
            ],
            'drenching-gun' => [
                'short_description' => 'Durable adjustable and fixed-dose drenchers for controlled oral administration of liquid livestock products.',
                'description' => 'The Farm Care Drenching Gun range is built for controlled oral dosing of livestock liquids. Available patterns include stainless-steel adjustable-dose models for smaller livestock and durable plastic adjustable or fixed-dose models for cattle, sheep and goats. Curved metal nozzles, replaceable sealing components and washable construction support practical repeated farm use.',
                'features' => ['Adjustable-dose and fixed-dose options', 'Stainless-steel and durable plastic body choices', 'Curved metal drenching nozzle', 'Replaceable O-ring on applicable models', 'Washable reusable construction'],
                'benefits' => ['Supports repeatable oral dosing', 'Multiple body and dose configurations for different livestock', 'Reusable design suitable for routine farm programs', 'Serviceable sealing components on applicable models'],
                'applications' => ['Cattle oral dosing', 'Sheep and goat oral dosing', 'Farm health programs', 'Veterinary and livestock supply'],
                'package_contents' => ['Drenching gun', 'Drenching nozzle', 'Tubing/feeding hose where supplied', 'Model-specific seals or accessories'],
                'specifications' => ['Body Options' => 'Stainless steel or durable plastic', 'Dose Options' => 'Adjustable or fixed dose depending on model', 'Typical Adjustable Range' => 'Model dependent; some patterns 1–10 ml', 'Nozzle' => 'Curved metal', 'Animals' => 'Cattle, sheep, goats and other suitable livestock'],
                'care_instructions' => 'Flush thoroughly with clean water immediately after use. Follow the administered product manufacturer’s cleaning guidance, inspect seals and nozzle, and allow all components to dry before storage.',
                'usage_notes' => 'Dose selection and administration should follow the medicine or supplement label and veterinary guidance. The product page describes equipment only and does not replace professional dosing instructions.',
                'image' => 'seed/drenching-gun.jpg',
            ],
            'castration-plier' => [
                'short_description' => 'Professional Burdizzo-style livestock castration forceps manufactured for trained veterinary and livestock personnel.',
                'description' => 'The Farm Care Castration Plier / Forceps category includes heavy-duty Burdizzo-style instruments and related livestock castration tools. These products are intended for professional livestock management and are manufactured with robust metal working surfaces and durable handle configurations for repeated field use.',
                'features' => ['Professional Burdizzo / forceps patterns', 'Heavy-duty metal construction', 'Wooden or plastic handle options on selected models', 'Multiple tool patterns available', 'Designed for professional livestock use'],
                'benefits' => ['Robust reusable instrument construction', 'Different sizes and handle patterns available for buyer requirements', 'Suitable for veterinary distributors and professional farm operations'],
                'applications' => ['Veterinary practice', 'Professional cattle operations', 'Sheep and goat operations', 'Livestock supply distributors'],
                'package_contents' => ['Castration plier / forceps', 'Model-specific handle configuration'],
                'specifications' => ['Instrument Type' => 'Burdizzo-style castration forceps / livestock castration plier', 'Construction' => 'Heavy-duty metal', 'Handle Options' => 'Model dependent; plastic or wooden options may be available', 'Use' => 'Professional livestock management', 'Supply' => 'Wholesale, distributor and OEM inquiries'],
                'care_instructions' => 'Clean, disinfect and dry the instrument after use according to veterinary instrument hygiene procedures. Inspect jaws, hinges and handles regularly for damage or misalignment.',
                'usage_notes' => 'This is a professional veterinary/livestock instrument. Castration is an animal-welfare-sensitive procedure and should only be performed by trained personnel using appropriate pain control and in compliance with local laws and veterinary guidance.',
                'image' => 'seed/castration-plier.jpg',
            ],
            'teat-dilators' => [
                'short_description' => 'Precision stainless-steel teat instruments for professional dairy and veterinary applications.',
                'description' => 'The Teat Dilators range covers precision stainless-steel instruments used by trained dairy and veterinary personnel for teat-canal management and related procedures. The range can include standard dilators, adjustable patterns, milk siphons and other specialist teat instruments depending on the buyer requirement.',
                'features' => ['Stainless-steel construction', 'Precision-finished working surfaces', 'Standard and adjustable patterns available', 'Specialist teat instruments available within the category', 'Reusable professional design'],
                'benefits' => ['Corrosion-resistant construction', 'Easy-to-clean professional instrument surfaces', 'Multiple patterns for different veterinary supply requirements'],
                'applications' => ['Dairy veterinary practice', 'Dairy farm health management', 'Veterinary supply distribution', 'Professional teat-care procedures'],
                'package_contents' => ['Selected teat dilator or specialist teat instrument'],
                'specifications' => ['Material' => 'Stainless Steel', 'Patterns' => 'Standard / adjustable / specialist models', 'Application' => 'Professional dairy and veterinary teat care', 'Finish' => 'Smooth precision metal finish', 'Supply' => 'Retail, wholesale and OEM inquiries'],
                'care_instructions' => 'Clean, disinfect or sterilize as required by the procedure and veterinary protocol. Dry fully before storage and protect precision surfaces from damage.',
                'usage_notes' => 'Teat instruments should only be used by trained personnel. Incorrect insertion or manipulation can injure the teat canal or introduce infection; follow veterinary guidance and hygiene protocols.',
                'image' => 'seed/teat-dilator.jpg',
            ],
            'bolus-gun' => [
                'short_description' => 'Reusable livestock bolus applicator designed for controlled administration of compatible boluses and capsules.',
                'description' => 'The Farm Care Bolus Gun is a livestock medication applicator designed to help trained handlers administer compatible boluses or capsules efficiently. The long applicator profile and plunger mechanism are intended to provide controlled placement while reducing direct hand contact with the dose.',
                'features' => ['Long livestock applicator profile', 'Manual plunger operation', 'Reusable durable construction', 'Different sizes/models can be supplied', 'Suitable for compatible bolus products'],
                'benefits' => ['Supports efficient administration of compatible boluses', 'Reusable tool for livestock health programs', 'Straightforward manual operation', 'Suitable for farm and veterinary supply channels'],
                'applications' => ['Cattle bolus administration', 'Livestock mineral or medication programs', 'Veterinary practice', 'Farm supply and distribution'],
                'package_contents' => ['Bolus applicator / bolus gun'],
                'specifications' => ['Product Type' => 'Manual livestock bolus applicator', 'Construction' => 'Metal / model-dependent components', 'Operation' => 'Manual plunger', 'Compatibility' => 'Depends on bolus dimensions and selected applicator size', 'Supply' => 'Wholesale, distributor and OEM inquiries'],
                'care_instructions' => 'Clean and disinfect after use according to farm or veterinary hygiene procedures. Ensure the barrel and plunger move freely and dry completely before storage.',
                'usage_notes' => 'Use only with compatible bolus sizes and by trained livestock handlers. Follow the bolus product label and veterinary direction; do not force an applicator if resistance is encountered.',
                'image' => 'seed/bolus-gun.jpg',
            ],
            'tpx-syringe' => [
                'short_description' => 'Reusable TPX veterinary syringe with clear scale, stainless internal components and resistance to heat, acid and alcohol exposure.',
                'description' => 'The TPX Syringe is designed for repeated veterinary and livestock use where durability and chemical resistance are important. Its transparent TPX body provides dose visibility, while stainless internal components, a clear scale and sealing gasket support smooth operation and reliable fluid control. Compatible needle connection depends on the selected model.',
                'features' => ['High-temperature-tolerant TPX body', 'Resistance to acid and alcohol exposure', 'Transparent barrel with durable scale', 'Stainless internal components', 'Sealing gasket designed to reduce air/liquid leakage'],
                'benefits' => ['Long reusable service potential when properly maintained', 'Clear dose visibility', 'Smooth plunger movement and fluid delivery', 'Suitable for professional farm and veterinary use'],
                'applications' => ['Veterinary injections', 'Livestock vaccination programs', 'Farm treatment programs', 'Veterinary supply distribution'],
                'package_contents' => ['TPX veterinary syringe', 'Model-specific sealing components'],
                'specifications' => ['Body Material' => 'TPX transparent polymer', 'Internal Components' => 'Stainless material', 'Scale' => 'Clear graduated scale', 'Resistance' => 'High temperature, acid and alcohol resistance', 'Needle Connection' => 'Model dependent'],
                'care_instructions' => 'Clean and process the syringe according to the product specification and veterinary hygiene requirements. Check seals, barrel clarity, scale readability and plunger movement before reuse.',
                'usage_notes' => 'Use appropriate sterile needles and follow veterinary injection, medication and biosecurity procedures. Temperature and chemical resistance limits depend on the exact syringe model.',
                'image' => 'seed/tpx-syringe.jpg',
            ],
            'transparent-syringe' => [
                'short_description' => 'Washable transparent plastic veterinary syringe designed for clear dose visibility and practical everyday farm use.',
                'description' => 'The Transparent Plastic Body Syringe is a practical reusable veterinary syringe built around a clear, durable barrel for easy dose visibility. Its simple washable design makes it suitable for routine livestock handling, treatment and vaccination workflows where the selected model and local protocol permit reuse.',
                'features' => ['Transparent plastic barrel', 'Clear graduated scale', 'Washable reusable construction', 'Simple manual plunger design', 'Model-dependent needle connection'],
                'benefits' => ['Easy visual confirmation of liquid volume', 'Lightweight handling', 'Straightforward cleaning and maintenance', 'Useful for routine farm supply requirements'],
                'applications' => ['Livestock treatment programs', 'Vaccination workflows', 'Veterinary clinics', 'Farm and veterinary distributors'],
                'package_contents' => ['Transparent-body veterinary syringe', 'Model-specific seals/components'],
                'specifications' => ['Body' => 'Transparent durable plastic', 'Operation' => 'Manual syringe', 'Scale' => 'Graduated dose markings', 'Maintenance' => 'Washable / reusable where appropriate', 'Connection' => 'Model dependent'],
                'care_instructions' => 'Clean immediately after use and process in accordance with the medicine, veterinary and biosecurity requirements. Replace damaged seals or barrels and do not use a syringe with cracks or poor plunger action.',
                'usage_notes' => 'Use with suitable sterile needles and according to veterinary guidance. Reuse is only appropriate when the specific product, medication and hygiene protocol permit it.',
                'image' => 'seed/transparent-syringe.jpg',
            ],
            'ai-gun' => [
                'short_description' => 'Professional artificial-insemination guns including self-lock and universal auto-lock patterns compatible with 0.25 ml and 0.5 ml straws.',
                'description' => 'The Farm Care Artificial Insemination Gun range includes self-lock, universal auto-lock and related professional insemination-gun patterns. Selected models are designed for compatibility with both 0.25 ml and 0.5 ml semen straws and disposable AI sheaths. Flexible plungers and accurately finished barrels support professional breeding workflows.',
                'features' => ['0.25 ml and 0.5 ml straw compatibility on selected models', 'Self-lock and universal auto-lock options', 'Designed to fit compatible disposable AI sheaths', 'Flexible plunger construction on selected models', 'Multiple barrel profiles and dimensions available'],
                'benefits' => ['Supports common straw formats', 'Reusable professional instrument construction', 'Multiple locking patterns for technician preference', 'Suitable for breeding centers and veterinary distributors'],
                'applications' => ['Cattle artificial insemination', 'Buffalo breeding programs', 'Breeding centers', 'Veterinary reproductive services'],
                'package_contents' => ['AI gun', 'Plunger assembly', 'Model-specific locking/fitting components'],
                'specifications' => ['Straw Compatibility' => '0.25 ml and/or 0.5 ml depending on model', 'Typical Barrel Length' => 'Approx. 435–440 mm on selected models', 'Typical Barrel Diameter' => 'Approx. 3.60–3.70 mm on selected models', 'Instrument Type' => 'Self-lock / Universal Auto-Lock / Conical O-Ring variants', 'Application' => 'Professional artificial insemination'],
                'care_instructions' => 'Clean and disinfect the reusable instrument according to breeding-center hygiene protocols. Inspect the barrel, plunger and locking mechanism before use and store dry in a protected location.',
                'usage_notes' => 'Artificial insemination should be performed by trained technicians using appropriate semen-handling, hygiene and animal-welfare procedures. Confirm straw and sheath compatibility with the selected gun model.',
                'image' => 'seed/ai-gun.jpg',
            ],
        ];
    }
};
