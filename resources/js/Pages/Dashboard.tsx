import InputRadioBox from "@/Components/InputRadioBox";
import { Button } from "@/Components/ui/button";
import { Input } from "@/Components/ui/input";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps, Toast } from "@/types";
import { Head, useForm, usePage } from "@inertiajs/react";
import {
    BadgePercent,
    RectangleHorizontal,
    RectangleVertical,
} from "lucide-react";
import React from "react";
import toast from "react-hot-toast";

export interface FormData {
    folder_path: string;
    product_name: string;
    product_mark: string | null;
    product_qte: string | null;
    decimal_price: number | null;
    fractional_price: number | null;
    decimal_old_price: number | null;
    fractional_old_price: number | null;
    with_percentage: boolean;
    with_lot: boolean;
    with_free: boolean;
    free: string | null;
    vertical: boolean;
    percentage: number | null;
    lots: number | null;
}

export type Props = {
    folder_path: string | undefined;
    message: string;
    success: boolean;
} & PageProps;
const extraOptions = [
    { label: "Oui", value: true, icon: null },
    { label: "Non", value: false, icon: null },
];
const orientationOptions = [
    { label: "Verticale", value: true, icon: RectangleVertical },
    { label: "Horizontale", value: false, icon: RectangleHorizontal },
];

const Dashboard = ({}: Props) => {
    const { toastData, folderPath } = usePage().props as {
        toastData: Toast;
        folderPath: string;
    };

    const { data, setData, post, processing, errors, reset } =
        useForm<FormData>({
            product_name: "",
            product_mark: null,
            product_qte: null,
            folder_path: folderPath ?? "",
            decimal_price: null,
            fractional_price: null,
            decimal_old_price: null,
            fractional_old_price: null,
            with_percentage: false,
            with_free: false,
            free: null,
            with_lot: false,
            vertical: true,
            percentage: null,
            lots: null,
        });

    React.useEffect(() => {
        if (toastData) {
            if (toastData.success) {
                toast.success(toastData.message);
            } else if (toastData.message) {
                toast.error(toastData.message);
            }
        }
    }, [toastData]);

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault();

        try {
            post(route("generatePromotionImage"));
        } catch (error) {
            console.error("Error creating boat:", error);
        }
    };

    const handleOnChange = (event: any) => {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    };

    return (
        <AuthenticatedLayout>
            <Head title="Promotion" />

            <div className="py-12">
                <div className="flex flex-col gap-5 sm:w-[55%] justify-center mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between gap-2 p-6 bg-white shadow-sm sm:rounded-lg">
                        <h2 className="text-xl font-semibold leading-tight text-gray-800 uppercase">
                            Créer une promotion
                        </h2>
                        <BadgePercent />
                    </div>
                    <div className="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <form onSubmit={handleSubmit}>
                            <Input
                                name="folder_path"
                                label="Chemin du dossier"
                                placeholder="exemple: C:\Users\Bureau\images"
                                type="text"
                                value={data.folder_path}
                                error={errors.folder_path}
                                onChange={handleOnChange}
                                required
                            />
                            <h1 className="mt-4 text-xl font-semibold text-red-500 ">
                                Information sur le Produit
                            </h1>
                            <div className="flex gap-3 ">
                                <Input
                                    name="product_name"
                                    label="Nom*"
                                    placeholder="exemple: Javel.."
                                    type="text"
                                    value={data.product_name}
                                    error={errors.product_name}
                                    onChange={handleOnChange}
                                    required
                                />
                                <Input
                                    name="product_mark"
                                    label="Marque"
                                    placeholder="exemple: Lila.."
                                    type="text"
                                    value={data.product_mark ?? ""}
                                    error={errors.product_mark}
                                    onChange={handleOnChange}
                                />
                                <Input
                                    name="product_qte"
                                    label="Quantite"
                                    placeholder="exemple: 2 litres"
                                    type="text"
                                    value={data.product_qte ?? ""}
                                    error={errors.product_qte}
                                    onChange={handleOnChange}
                                />
                            </div>
                            <h1 className="mt-4 text-xl font-semibold text-red-500">
                                Nouveau Prix
                            </h1>
                            <div className="flex items-end gap-2 ">
                                <Input
                                    name="decimal_price"
                                    label="Partie Décimale*"
                                    placeholder="$"
                                    type="text"
                                    value={data.decimal_price ?? undefined}
                                    error={errors.decimal_price}
                                    onChange={handleOnChange}
                                    required
                                />
                                <span className="font-semibold">,</span>
                                <Input
                                    name="fractional_price"
                                    label="Partie Fractionnaire*"
                                    placeholder="$$$"
                                    type="text"
                                    value={data.fractional_price ?? undefined}
                                    error={errors.fractional_price}
                                    onChange={handleOnChange}
                                    required
                                />
                                <span className="font-semibold">DT</span>
                            </div>
                            <h1 className="mt-4 text-xl font-semibold text-red-500 ">
                                Ancien Prix
                            </h1>
                            <div className="flex items-end gap-2">
                                <Input
                                    name="decimal_old_price"
                                    label="Partie Décimale*"
                                    placeholder="$"
                                    type="text"
                                    value={data.decimal_old_price ?? undefined}
                                    error={errors.decimal_old_price}
                                    onChange={handleOnChange}
                                    required
                                />
                                <span className="font-semibold">,</span>
                                <Input
                                    name="fractional_old_price"
                                    label="Partie Fractionnaire*"
                                    placeholder="$$$"
                                    type="text"
                                    value={
                                        data.fractional_old_price ?? undefined
                                    }
                                    error={errors.fractional_old_price}
                                    onChange={handleOnChange}
                                    required
                                />
                                <span className="font-semibold">DT</span>
                            </div>
                            <h1 className="mt-4 text-xl font-semibold ">
                                Paramètres supplémentaires{" "}
                                <span className="text-sm text-gray-700">
                                    {" "}
                                    {"(Choisissez une seule option)"}{" "}
                                </span>
                            </h1>
                            <div className="mt-4 ">
                                <div className="flex items-end gap-3 ">
                                    <InputRadioBox
                                        label="Avec pourcentage :"
                                        options={extraOptions}
                                        value={data.with_percentage}
                                        error={errors.with_percentage}
                                        setValue={(val) => {
                                            setData((prevData: FormData) => ({
                                                ...prevData,
                                                with_percentage: val as boolean,
                                                with_lot: false,
                                                with_free: false,
                                            }));
                                        }}
                                    />
                                    <div className="w-[100px] ">
                                        <Input
                                            disabled={!data.with_percentage}
                                            name="percentage"
                                            placeholder="00%"
                                            type="number"
                                            value={data.percentage ?? ""}
                                            error={errors.percentage}
                                            onChange={handleOnChange}
                                        />
                                    </div>
                                    <span className="font-semibold">%</span>
                                </div>
                                <div className="flex items-end gap-3 mt-6">
                                    <InputRadioBox
                                        label="Avec Lots :"
                                        options={extraOptions}
                                        value={data.with_lot}
                                        error={errors.with_lot}
                                        setValue={(val) => {
                                            setData((prevData: FormData) => ({
                                                ...prevData,
                                                with_lot: val as boolean,
                                                with_percentage: false,
                                                with_free: false,
                                            }));
                                        }}
                                    />
                                    <div className="w-[100px] ">
                                        <Input
                                            name="lots"
                                            placeholder="2"
                                            type="number"
                                            value={data.lots ?? undefined}
                                            error={errors.lots}
                                            disabled={!data.with_lot}
                                            onChange={handleOnChange}
                                        />
                                    </div>
                                    <span className="font-semibold">Lot</span>
                                </div>
                                <div className="flex items-end gap-3 mt-6">
                                    <InputRadioBox
                                        label="Gratuité "
                                        options={extraOptions}
                                        value={data.with_free}
                                        error={errors.with_free}
                                        setValue={(val) => {
                                            setData((prevData: FormData) => ({
                                                ...prevData,
                                                with_free: val as boolean,
                                                with_percentage: false,
                                                with_lot: false,
                                            }));
                                        }}
                                    />
                                    <div className="w-[100px] ">
                                        <Input
                                            name="free"
                                            placeholder="1+1"
                                            type="text"
                                            value={data.free ?? ""}
                                            error={errors.free}
                                            disabled={!data.with_free}
                                            onChange={handleOnChange}
                                        />
                                    </div>

                                    <span className="font-semibold">
                                        Gratuit
                                    </span>
                                </div>

                                <div className="flex flex-col items-center justify-center w-full gap-3 mt-8">
                                    <InputRadioBox
                                        options={orientationOptions}
                                        value={data.vertical}
                                        error={errors.vertical}
                                        setValue={(val) =>
                                            setData("vertical", val as boolean)
                                        }
                                    />
                                </div>
                            </div>

                            <Button
                                className="w-full mt-5 text-lg font-semibold "
                                variant={"destructive"}
                                type="submit"
                            >
                                Generer Image
                            </Button>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Dashboard;
